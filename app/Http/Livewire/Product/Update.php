<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Update extends Component
{
    use WithFileUploads;
    public $productId;
    public $plant_id;
    public $name;
    public $image;
    public $description;

    public function mount($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->plant_id = $product->plant_id;
        $this->name = $product->name;
        $this->description = $product->description;
    }

    public function update()
    {
        $rules = [
            'name' => ['required', 'string', 'min:3']
        ];

        $this->validate($rules);

        $product = Product::findOrFail($this->productId);

        if ($this->image) {
            $this->image->storeAs('public/products/', $this->image->hashName());
            $product->update([
                'plant_id' => $this->plant_id,
                'name' => $this->name,
                'slug' => SlugService::createSlug(Product::class, 'slug', $this->name),
                'image' => $this->image->hashName(),
                'description' => $this->description??null
            ]);
        } else {
            $product->update([
                'plant_id' => $this->plant_id,
                'name' => $this->name,
                'slug' => SlugService::createSlug(Product::class, 'slug', $this->name),
                'description' => $this->description??null
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
