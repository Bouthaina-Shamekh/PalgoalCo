<?php

namespace App\Livewire;

use Livewire\Component;

class DomainsComponent extends Component
{
     public $mode = 'index';
     
     public function showIndex()
    {
        $this->mode = 'index';
    }

    public function render()
    {
        return view('livewire.domains');
    }
}
