<?php


namespace App\Livewire;



use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


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
            'company_name' => '',
            'phone' => '',
            'can_login' => true,
            'avatar' => null,
        ];
    }

    public function save()
    {
        $validated = $this->validate([
            'client.first_name' => 'required',
            'client.last_name' => 'required',
            'client.email' => 'required|email|unique:clients,email,' . $this->clientId,
            'client.company_name' => 'required',
            'client.password' => $this->clientId ? 'nullable' : 'required|min:6',
            'client.phone' => 'nullable',
            'client.can_login' => 'boolean',
            'client.avatar' => 'nullable|image|max:1024',
        ]);
        $clientValidated = $validated['client'];

        $clientValidated['can_login'] = $clientValidated['can_login'] ? 1 : 0;

        if (isset($this->client['avatar'])) {
            $clientValidated['avatar'] = $this->client['avatar']->store('avatars', 'public');
        }

        if ($this->clientId) {
            $client = Client::findOrFail($this->clientId);
            if (isset($clientValidated['password'])) {
                $clientValidated['password'] = bcrypt($clientValidated['password']);
            }
            $client->update($clientValidated);
        } else {
            $clientValidated['password'] = bcrypt($clientValidated['password']);
            Client::create($clientValidated);
        }

        $this->resetForm();
        $this->resetPage();
        $this->mode = 'index';
    }


    public function delete($id)
    {
        Client::findOrFail($id)->delete();
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
        ->where('first_name', 'like', '%'.$this->search.'%')
        ->orWhere('last_name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('company_name', 'like', '%'.$this->search.'%')
        ->orWhere('phone', 'like', '%'.$this->search.'%')
        ->paginate($this->perPage);

        return view('livewire.client', compact('clients'));
    }
}
