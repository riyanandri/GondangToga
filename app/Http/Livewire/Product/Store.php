<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;
    public $plant_id;
    public $name;
    public $image;
    public $description;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:products,name', 'min:3'],
            'image' => ['required', 'image', 'max:2048']
        ];

        $this->validate($rules);
        $this->image->storeAs('public/products/', $this->image->hashName());

        Product::create([
            'plant_id' => $this->plant_id,
            'name' => $this->name,
            'slug' => SlugService::createSlug(Product::class, 'slug', $this->name),
            'image' => $this->image->hashName(),
            'description' => $this->description??null
        ]);

        session()->flash('message', 'Data produk berhasil ditambahkan.');

        return redirect()->route('products.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->get();

        return view('livewire.product.store', compact('plants'));
    }
}
