<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Update extends Component
{
    use WithFileUploads;
    public $productId;
    public $plant_id;
    public $name;
    public $image;
    public $link;

    public function mount($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->plant_id = $product->plant_id;
        $this->name = $product->name;
        $this->link = $product->link;
    }

    public function update(Product $product)
    {
        $rules = [
            'name' => ['required', 'string', 'min:3']
        ];

        $messages = [
            'name.required' => 'Kolom nama produk belum diisi.',
            'name.string' => 'Kolom nama produk harus berupa string.',
            'name.min' => 'Nama produk minimal 3 karakter.'
        ];

        $this->validate($rules, $messages);

        $product = Product::findOrFail($this->productId);

        if ($this->image) {
            if ($product->image) {
                Storage::delete('public/products/'.$product->image);
            }
            $this->image->storeAs('public/products/', $this->image->hashName());
            $product->update([
                'plant_id' => $this->plant_id,
                'name' => $this->name,
                'slug' => SlugService::createSlug(Product::class, 'slug', $this->name),
                'image' => $this->image->hashName(),
                'link' => $this->link??null
            ]);
        } else {
            $product->update([
                'plant_id' => $this->plant_id,
                'name' => $this->name,
                'slug' => SlugService::createSlug(Product::class, 'slug', $this->name),
                'link' => $this->link??null
            ]);
        }
        
        session()->flash('message' , 'Data produk berhasil diperbarui.');

        return redirect()->route('products.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->get();

        return view('livewire.product.update', compact('plants'));
    }
}
