<?php

namespace App\Http\Livewire;


use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AccountClient extends Component
{
    public $client;

    public function mount()
    {
        $this->client = auth()->user();
    }

    public function update()
    {
        $this->validate([
            'client.first_name' => 'required|string|max:255',
            'client.last_name' => 'required|string|max:255',
            'client.email' => 'required|string|email|max:255|unique:clients,email,' . $this->client->id,
            'client.company_name' => 'nullable|string|max:255',
            'client.phone' => 'nullable|string|max:255',
            'client.new_password' => 'nullable|confirmed|min:8',
        ]);

        if ($this->client->new_password) {
            $this->client->password = Hash::make($this->client->new_password);
        }

        $this->client->save();

        session()->flash('success', __('account Updated successfully'));
    }

    public function render()
    {
        return view('livewire.account-client');
    }
}
