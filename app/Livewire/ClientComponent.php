<?php


namespace App\Livewire;



use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;

class ClientComponent extends Component
{

    use WithFileUploads;

    public $search = '';
    public $perPage = 10;
    public $clients;
    public $first_name, $last_name, $email, $password, $company_name, $phone, $can_login = true, $avatar;
    public $clientIdBeingEdited = null;

    public function mount()
    {
        $this->loadClients();
    }

    public function loadClients()
    {
        $this->clients = Client::all();
    }

    public function save()
    {
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $this->clientIdBeingEdited,
            'company_name' => 'required',
            'password' => $this->clientIdBeingEdited ? 'nullable' : 'required|min:6',
            'phone' => 'nullable',
            'can_login' => 'boolean',
            'avatar' => 'nullable|image|max:1024',
        ]);

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        }

        if ($this->clientIdBeingEdited) {
            $client = Client::findOrFail($this->clientIdBeingEdited);
            $client->update(array_merge($validated, [
                'password' => $validated['password'] ? bcrypt($validated['password']) : $client->password
            ]));
        } else {
            $validated['password'] = bcrypt($validated['password']);
            Client::create($validated);
        }

        $this->resetForm();
        $this->loadClients();
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $this->clientIdBeingEdited = $id;
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->email = $client->email;
        $this->company_name = $client->company_name;
        $this->phone = $client->phone;
        $this->can_login = $client->can_login;
    }

    public function delete($id)
    {
        Client::findOrFail($id)->delete();
        $this->loadClients();
    }

//     public function confirmDelete($id)
// {
//     $this->clientIdBeingDeleted = $id;
// }

// public function deleteConfirmed()
// {
//     Client::findOrFail($this->clientIdBeingDeleted)->delete();
//     $this->clientIdBeingDeleted = null;
//     $this->loadClients();
// }

    public function resetForm()
    {
        $this->reset(['first_name', 'last_name', 'email', 'password', 'company_name', 'phone', 'can_login', 'avatar', 'clientIdBeingEdited']);
    }

     public function render()
    {
        $clients = Client::query()
            ->when($this->search, fn($query) =>
                $query->where('first_name', 'like', "%{$this->search}%")
                      ->orWhere('last_name', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate($this->perPage);

        return view('dashboard.clients.index', compact('clients'));
    }
}
