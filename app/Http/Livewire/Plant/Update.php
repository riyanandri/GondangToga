<?php

namespace App\Http\Livewire\Plant;

use App\Models\Plant;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $plantId;
    public $category_id;
    public $name;
    public $latin;
    public $image;
    public $hero;
    public $information;

    public function mount($id)
    {
        $plant = Plant::findOrFail($id);

        $this->plantId = $plant->id;
        $this->category_id = $plant->category_id;
        $this->name = $plant->name;
        $this->latin = $plant->latin;
        $this->information = $plant->information;
    }

    public function update()
    {
        $rules = [
            'name' => ['required', 'string', 'min:3'],
            'latin' => ['required', 'string', 'min:3'],
        ];

        $messages = [
            'name.required' => 'Kolom nama tanaman belum diisi.',
            'name.string' => 'Kolom nama tanaman harus berupa string.',
            'name.min' => 'Nama tanaman minimal 3 karakter.',
            'latin.required' => 'Kolom nama latin tanaman belum diisi.',
            'latin.string' => 'Kolom nama latin tanaman harus berupa string.',
            'latin.min' => 'Nama latin tanaman minimal 3 karakter.',
        ];

        $this->validate($rules, $messages);

        $plant = Plant::findOrFail($this->plantId);

        if ($this->image && $this->hero) {
            $this->image->storeAs('public/plants/', $this->image->hashName());
            $this->hero->storeAs('public/backgrounds/', $this->hero->hashName());
            $plant->update([
                'category_id' => $this->category_id,
                'name' => $this->name,
                'slug' => SlugService::createSlug(Plant::class, 'slug', $this->name),
                'latin' => $this->latin,
                'image' => $this->image->hashName(),
                'hero' => $this->hero->hashName(),
                'information' => $this->information??null
            ]);
        } else {
            $plant->update([
                'category_id' => $this->category_id,
                'name' => $this->name,
                'slug' => SlugService::createSlug(Plant::class, 'slug', $this->name),
                'latin' => $this->latin,
                'information' => $this->information??null
            ]);
        }

        session()->flash('message', 'Data tanaman berhasil diperbarui.');
        
        return redirect()->route('plants.index');
    }

    public function render()
    {
        $categories = \App\Models\Category::orderBy('name', 'ASC')->get();

        return view('livewire.plant.update', compact('categories'));
    }
}
