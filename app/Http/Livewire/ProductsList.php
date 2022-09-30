<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;
    public function render()
    {
        // dd(Product::paginate(2));
        return view('livewire.products-list', ['products' => Product::paginate(2)]);
    }
}
