<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Domain;
use Livewire\Component;
use App\Models\Site;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class SiteComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $alert = false;
    public $alertType = 'success';
    public $alertMessage = '';

    public function showAlert($message, $type = 'success')
    {
        $this->alert = true;
        $this->alertType = $type;
        $this->alertMessage = $message;
    }

    public function closeModal()
    {
        $this->alert = false;
    }

    public $mode = 'index';
    public $search = '';
    public $perPage = 10;
    public $siteId = null;
    public $clients = [];
    public $domains = [];

    public $site = [
        'client_id' => '',
        'domain_id' => '',
        'provisioning_status' => '',
        'cpanel_username' => '',
        'cpanel_password' => '',
        'cpanel_url' => '',
        'provisioned_at' => '',
    ];

    public function showAdd()
    {
        $this->mode = 'add';
        $this->clients = Client::get();
        $this->domains = Domain::get();
        $this->resetForm();
        $this->closeModal();
    }

    public function showEdit($id)
    {
        $this->mode = 'edit';
        $this->siteId = $id;
        $this->clients = Client::get();
        $this->domains = Domain::get();
        $site = Site::findOrFail($id);
        $this->site = [
            'client_id' => $site->client_id,
            'domain_id' => $site->domain_id,
            'cpanel_username' => $site->cpanel_username,
            'cpanel_password' => $site->cpanel_password,
            'cpanel_url' => $site->cpanel_url,
            'provisioning_status' => $site->provisioning_status,
            'provisioned_at' => $site->provisioned_at,
        ];
        $this->closeModal();
    }

    public function showIndex()
    {
        $this->mode = 'index';
        $this->closeModal();
    }

    public function resetForm()
    {
        $this->site = [
            'client_id' => '',
            'domain_id' => '',
            'provisioning_status' => '',
            'cpanel_username' => '',
            'cpanel_password' => '',
            'cpanel_url' => '',
            'provisioned_at' => '',
        ];
        $this->siteId = null;
    }

    public function save()
    {
        $validated = $this->validate([
            'site.client_id' => 'required|exists:clients,id',
            'site.domain_id' => 'required|exists:domains,id',
            'site.provisioning_status' => 'required|string|max:255',
            'site.cpanel_username' => 'required|string|max:255',
            'site.cpanel_password' => 'required|string|max:255',
            'site.cpanel_url' => 'required|url|max:255',
            'site.provisioned_at' => 'required|date',
        ]);

        $siteValidated = $validated['site'];

        if ($this->siteId) {
            $site = Site::findOrFail($this->siteId);
            $site->update($siteValidated);
            $this->showAlert('Site updated successfully.', 'success');
        } else {
            Site::create($siteValidated);
            $this->showAlert('Site added successfully.', 'success');
        }

        $this->resetForm();
        $this->resetPage();
        $this->mode = 'index';
    }

    public function delete($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();

        $this->showAlert('Site deleted successfully.', 'success');
        $this->resetPage();
    }

    public function updateSearch()
    {
        $this->resetPage();
    }

    public function updatePerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $sites = Site::query()
            ->orWhere('cpanel_username', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.site', compact('sites'));
    }
}
