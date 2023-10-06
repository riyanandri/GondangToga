<?php

namespace App\Http\Livewire\Plant;

use App\Models\Plant;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $latin;
    public $image;
    public $hero;
    public $information;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:plants,name', 'min:3'],
            'latin' => ['required', 'string', 'unique:plants,latin', 'min:3'],
            'image' => ['required', 'image', 'max:2048'],
            'hero' => ['required', 'image', 'max:5120']
        ];

        $this->validate($rules);
        $this->image->storeAs('public/plants/', $this->image->hashName());
        $this->hero->storeAs('public/backgrounds/', $this->hero->hashName());

        Plant::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => SlugService::createSlug(Plant::class, 'slug', $this->name),
            'latin' => $this->latin,
            'image' => $this->image->hashName(),
            'hero' => $this->hero->hashName(),
            'information' => $this->information??null
        ]);

        session()->flash('message', 'Data tanaman berhasil ditambahkan.');

        return redirect()->route('plants.index');
    }

    public function render()
    {
        $categories = \App\Models\Category::orderBy('name', 'ASC')->get();

        return view('livewire.plant.store', compact('categories'));
    }
}
