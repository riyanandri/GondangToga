<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Update extends Component
{
    use WithFileUploads;
    public $categoryId;
    public $name;
    public $image;
    public $short_description;

    public function mount($id)
    {
        $category = Category::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->short_description = $category->short_description;
    }

    public function update()
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

        if ($this->image) {
            $this->image->storeAs('public/categories/', $this->image->hashName());
            $category->update([
                'name' => $this->name,
                'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
                'image' => $this->image->hashName(),
                'short_description' => $this->short_description
            ]);
        } else {
            $category->update([
                'name' => $this->name,
                'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
                'short_description' => $this->short_description
            ]);
        }

        session()->flash('message', 'Data kategori berhasil diperbarui.');

        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.update');
    }
}
