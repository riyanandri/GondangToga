<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Store extends Component
{
    public $plant_id;
    public $title;
    public $content;

    public function store()
    {
        $rules = [
            'title' => ['required', 'string', 'min:3'],
        ];

        $this->validate($rules);

        $data = [
            'plant_id' => $this->plant_id,
            'title' => $this->title,
            'content' => $this->content
        ];

        Article::create($data);

        session()->flash('message', 'Data konten berhasil ditambahkan');

        return redirect()->route('contents.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->get();

        return view('livewire.article.store', compact('plants'));
    }
}
