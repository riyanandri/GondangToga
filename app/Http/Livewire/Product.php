<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];
    public $limitPerPage = 5;

    public function destroy($id)
    {
        \App\Models\Product::destroy($id);

        session()->flash('message', 'Data produk berhasil dihapus.');

        return redirect()->route('products.index');
    }

    public function render()
    {
        $products = \App\Models\Product::with('plant')->orderBy('name', 'ASC')->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $products = \App\Models\Product::whereHas('plant', function ($query){
                return $query->where('products.name','like', '%' . $this->search . '%')
                                ->orWhere('plants.name','like', '%' . $this->search . '%');
            })->orderBy('products.name')->paginate($this->limitPerPage);
        }

        return view('livewire.product', ['products' => $products]);
    }
}
