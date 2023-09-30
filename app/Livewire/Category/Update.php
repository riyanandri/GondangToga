<?php

namespace App\Livewire\Category;

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

    public function mount($id)
    {
        $category = Category::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $rules = [
            'name' => ['required', 'string', 'min:3'],
        ];

        $this->validate($rules);
        
        $category = Category::findOrFail($this->categoryId);

        if ($this->image) {
            $this->image->storeAs('public/categories/', $this->image->hashName());
            $category->update([
                'name' => $this->name,
                'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
                'image' => $this->image->hashName(),
            ]);
        } else {
            $category->update([
                'name' => $this->name,
                'slug' => SlugService::createSlug(Category::class, 'slug', $this->name),
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
