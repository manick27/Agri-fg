<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Budget;

class EnAttente extends Component
{
    public Budget $budget;
    public $start = false;

    public function mount(){
        
    }

    protected $listeners = [
        'annoucement-update' => 'update',
    ];

    public function countDown(){

        $this->mount();
    }

    public function render()
    {
        return view('livewire.en-attente');
    }
}
