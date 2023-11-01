<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Store extends Component
{
    public $name;
    public $short_description;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:categories,name', 'min:3'],
            'short_description' => ['required', 'string']
        ];

        $messages = [
            'name.required' => 'Kolom nama kategori belum diisi.',
            'name.string' => 'Kolom nama kategori harus berupa string.',
            'name.unique' => 'Nama kategori sudah ada.',
            'name.min' => 'Nama kategori minimal 3 karakter.',
            'short_description.required' => 'Kolom deskripsi singkat belum diisi.',
            'short_description.string' => 'Kolom deskripsi singkat harus berupa string.'
        ];

        $this->validate($rules, $messages);
        Category::create([
            'name' => $this->name,
            'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
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
