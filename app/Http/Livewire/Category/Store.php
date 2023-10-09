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
    public $short_description;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:categories,name', 'min:3'],
            'image' => ['required', 'image', 'max:2048'],
            'short_description' => ['required', 'string']
        ];

        $messages = [
            'name.required' => 'Kolom nama kategori belum diisi.',
            'name.string' => 'Kolom nama kategori harus berupa string.',
            'name.unique' => 'Nama kategori sudah ada.',
            'name.min' => 'Nama kategori minimal 3 karakter.',
            'image.required' => 'Kolom gambar belum diisi.',
            'image.image' => 'Kolom gambar harus berupa jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'short_description.required' => 'Kolom deskripsi singkat belum diisi.',
            'short_description.string' => 'Kolom deskripsi singkat harus berupa string.'
        ];

        $this->validate($rules, $messages);
        $this->image->storeAs('public/categories/', $this->image->hashName());
        Category::create([
            'name' => $this->name,
            'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
            'image' => $this->image->hashName(),
            'short_description' => $this->short_description
        ]);

        session()->flash('message', 'Data kategori berhasil ditambahkan.');
    
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.store');
    }
}
