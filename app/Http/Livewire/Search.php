<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $key_words = '';

    protected $queryString = [
        'key_words' => ['except' => ''],
    ];

    public function searchBy(){

        $this->emit('search-by-key-words', $this->key_words);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
