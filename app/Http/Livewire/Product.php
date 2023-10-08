<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];

    public function destroy($id)
    {
        \App\Models\Product::destroy($id);

        session()->flash('message', 'Data produk berhasil dihapus.');

        return redirect()->route('products.index');
    }

    public function render()
    {
        $products = \App\Models\Product::with('plant')->latest()->get();

        if ($this->search !== null) {
            $products = \App\Models\Product::whereHas('plant', function ($query){
                return $query->where('products.name','like', '%' . $this->search . '%')
                                ->orWhere('plants.name','like', '%' . $this->search . '%');
            })->latest()->get();
        }

        return view('livewire.product', ['products' => $products]);
    }
}
