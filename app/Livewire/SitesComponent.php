<?php

namespace App\Livewire;

use Livewire\Component;

class SitesComponent extends Component
{
    public $mode = 'index';

    
    public function showAdd()
    {
        $this->mode = 'add';
        // $this->resetForm();
    }

    public function showIndex()
    {
        $this->mode = 'index';
    }

    public function render()
    {
        return view('livewire.sites');
    }
}
