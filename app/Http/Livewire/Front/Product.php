<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Product extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];
    public $limitPerPage = 12;

    public function render()
    {
        $products = \App\Models\Product::with('plant')->orderBy('name', 'ASC')->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $products = \App\Models\Product::whereHas('plant', function ($query){
                return $query->where('products.name','like', '%' . $this->search . '%');
            })->orderBy('name', 'ASC')->paginate($this->limitPerPage);
        }

        return view('product', ['products' => $products])->layout('layouts.web');
    }
}
