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
    public $link;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:products,name', 'min:3'],
            'image' => ['required', 'image', 'max:2048']
        ];

        $messages = [
            'name.required' => 'Kolom nama produk belum diisi.',
            'name.string' => 'Kolom nama produk harus berupa string.',
            'name.unique' => 'Nama produk sudah ada.',
            'name.min' => 'Nama produk minimal 3 karakter.',
            'image.required' => 'Kolom gambar belum diisi.',
            'image.image' => 'Kolom gambar harus berupa jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar maksimal 2MB.'
        ];

        $this->validate($rules, $messages);
        $this->image->storeAs('public/products/', $this->image->hashName());

        Product::create([
            'plant_id' => $this->plant_id,
            'name' => $this->name,
            'slug' => SlugService::createSlug(Product::class, 'slug', $this->name),
            'image' => $this->image->hashName(),
            'link' => $this->link??null
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
