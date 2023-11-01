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
    public $content;

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'unique:plants,name', 'min:3'],
            'latin' => ['required', 'string', 'unique:plants,latin', 'min:3'],
            'image' => ['required', 'image', 'max:2048'],
            'hero' => ['required', 'image', 'max:5120'],
            'content' => ['required']
        ];

        $messages = [
            'name.required' => 'Kolom nama tanaman belum diisi.',
            'name.string' => 'Kolom nama tanaman harus berupa string.',
            'name.unique' => 'Nama tanaman sudah ada.',
            'name.min' => 'Nama tanaman minimal 3 karakter.',
            'latin.required' => 'Kolom nama latin tanaman belum diisi.',
            'latin.string' => 'Kolom nama latin tanaman harus berupa string.',
            'latin.unique' => 'Nama latin tanaman sudah ada.',
            'latin.min' => 'Nama latin tanaman minimal 3 karakter.',
            'image.required' => 'Kolom gambar belum diisi.',
            'image.image' => 'Kolom gambar harus berupa jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'hero.required' => 'Kolom background belum diisi.',
            'hero.image' => 'Kolom background harus berupa jpg, jpeg, atau png.',
            'hero.max' => 'Ukuran background maksimal 5MB.',
            'content.required' => 'Konten belum diisi.'
        ];

        $this->validate($rules, $messages);
        $this->image->storeAs('public/plants/', $this->image->hashName());
        $this->hero->storeAs('public/backgrounds/', $this->hero->hashName());

        Plant::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => SlugService::createSlug(Plant::class, 'slug', $this->name),
            'latin' => $this->latin,
            'image' => $this->image->hashName(),
            'hero' => $this->hero->hashName(),
            'information' => $this->information??null,
            'content' => $this->content
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
