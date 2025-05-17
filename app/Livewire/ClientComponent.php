<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ClientComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $mode = 'index';
    public $search = '';
    public $perPage = 10;
    public $clientId = null;

    public $client = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
        'company_name' => '',
        'phone' => '',
        'can_login' => true,
        'avatar' => null,
    ];

    public function showAdd()
    {
        $this->mode = 'add';
        $this->resetForm();
    }

    public function showEdit($id)
    {
        $this->mode = 'edit';
        $this->clientId = $id;
        $client = Client::findOrFail($id);
        $this->client = [
            'first_name' => $client->first_name,
            'last_name' => $client->last_name,
            'email' => $client->email,
            'company_name' => $client->company_name,
            'phone' => $client->phone,
            'can_login' => $client->can_login,
            'password' => '',
            'password_confirmation' => '',
            'avatar' => null,
            'avatar_url' => $client->avatar,
        ];
    }

    public function showIndex()
    {
        $this->mode = 'index';
    }

    public function resetForm()
    {
        $this->client = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
            'company_name' => '',
            'phone' => '',
            'can_login' => true,
            'avatar' => null,
        ];
        $this->clientId = null;
    }

    public function save()
    {
        $validated = $this->validate([
            'client.first_name' => 'required',
            'client.last_name' => 'required',
            'client.email' => 'required|email|unique:clients,email,' . $this->clientId,
            'client.company_name' => 'nullable',
            'client.password' => $this->clientId ? 'nullable|min:6|same:client.password_confirmation' : 'required|min:6|same:client.password_confirmation',
            'client.password_confirmation' => $this->clientId ? 'nullable' : 'required',
            'client.phone' => 'required',
            'client.can_login' => 'boolean',
            'client.avatar' => 'nullable|image|max:1024',
        ]);

        $clientValidated = $validated['client'];
        $clientValidated['can_login'] = $clientValidated['can_login'] ? 1 : 0;

        if ($this->clientId) {
            $client = Client::findOrFail($this->clientId);

            if ($this->client['avatar']) {
                if ($client->avatar && Storage::disk('public')->exists($client->avatar)) {
                    Storage::disk('public')->delete($client->avatar);
                }

                $clientValidated['avatar'] = $this->client['avatar']->store('avatars', 'public');
            }

            if (!empty($clientValidated['password'])) {
                $clientValidated['password'] = bcrypt($clientValidated['password']);
            } else {
                unset($clientValidated['password']);
            }

            $client->update($clientValidated);
            session()->flash('success', 'Client updated successfully.');
        } else {
            if ($this->client['avatar']) {
                $clientValidated['avatar'] = $this->client['avatar']->store('avatars', 'public');
            }

            $clientValidated['password'] = bcrypt($clientValidated['password']);
            Client::create($clientValidated);
            session()->flash('success', 'Client added successfully.');
        }

        $this->resetForm();
        $this->resetPage();
        $this->mode = 'index';
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        if ($client->avatar && Storage::disk('public')->exists($client->avatar)) {
            Storage::disk('public')->delete($client->avatar);
        }
        $client->delete();

        session()->flash('success', 'Client deleted successfully.');
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
        $clients = Client::query()
            ->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('company_name', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.client', compact('clients'));
    }
}
