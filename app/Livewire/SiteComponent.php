<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class SiteComponent extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $mode = 'index';
    public $search = '';
    public $perPage = 10;
    public $siteId = null;

    public $site = [
        'client_id' => '',
        'domain_id' => '',
        'provisioning_status' => '',
        'cpanel_username' => '',
        'cpanel_password' => '',
        'cpanel_url' => '',
    ];

    public function showAdd()
    {
        $this->mode = 'add';
        $this->resetForm();
    }

    public function showEdit($id)
    {
        $this->mode = 'edit';
        $this->siteId = $id;
        $site = Site::findOrFail($id);
        $this->site = [
            'client_id' => $site->client_id,
            'domain_id' => $site->domain_id,
            'cpanel_username' => $site->cpanel_username,
            'cpanel_password' => $site->cpanel_password,
            'cpanel_url' => $site->cpanel_url,
            'provisioning_status' => $site->provisioning_status,
        ];
    }

     public function showIndex()
    {
        $this->mode = 'index';
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
        'site.provisioned_at' => 'nullable|date',
    ]);

    $data = $validated['site'];

    if ($this->siteId) {
        $site = Site::findOrFail($this->siteId);
        $site->update($data);
        session()->flash('success', '   Updater Successfully.');
    } else {
        Site::create($data);
        session()->flash('success', 'Created Successfully.');
    }

    $this->resetForm();
    $this->resetPage();
    $this->mode = 'index';
}

public function delete($id)
{
    $site = Site::findOrFail($id);
    $site->delete();

    session()->flash('success', 'Deleted Successfully.');
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
            ->where('cpanel_username', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.site', compact('sites'));
    }

}
