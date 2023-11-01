<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Update extends Component
{
    public $categoryId;
    public $name;
    public $short_description;

    public function mount($id)
    {
        $category = Category::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->short_description = $category->short_description;
    }

    public function update(Category $category)
    {
        $rules = [
            'name' => ['required', 'string', 'min:3'],
            'short_description' => ['required', 'string']
        ];

        $messages = [
            'name.required' => 'Kolom nama kategori belum diisi.',
            'name.string' => 'Kolom nama kategori harus berupa string.',
            'name.min' => 'Nama kategori minimal 3 karakter.',
            'short_description.required' => 'Kolom deskripsi singkat belum diisi.',
            'short_description.string' => 'Kolom deskripsi singkat harus berupa string.'
        ];

        $this->validate($rules, $messages);
        
        $category = Category::findOrFail($this->categoryId);

        $category->update([
            'name' => $this->name,
            'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
            'short_description' => $this->short_description
        ]);

        session()->flash('message', 'Data kategori berhasil diperbarui.');

        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.update');
    }
}
