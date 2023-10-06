<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;
    public $name;
    public $image;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:categories,name', 'min:3'],
            'image' => ['required', 'image', 'max:1024'],
        ];

        $this->validate($rules);
        $this->image->storeAs('public/categories/', $this->image->hashName());
        Category::create([
            'name' => $this->name,
            'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
            'image' => $this->image->hashName(),
        ]);

        session()->flash('message', 'Data kategori berhasil ditambahkan.');
    
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.store');
    }
}
