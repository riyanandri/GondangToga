<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Update extends Component
{
    public $articleId;
    public $plant_id;
    public $title;
    public $content;

    public function mount($id)
    {
        $article = Article::findOrFail($id);

        $this->articleId = $article->id;
        $this->plant_id = $article->plant_id;
        $this->title = $article->title;
        $this->content = $article->content;
    }

    public function update()
    {
        $rules = [
            'title' => ['required', 'string', 'min:3'],
        ];

        $this->validate($rules);

        $article = Article::findOrFail($this->articleId);

        $article->update([
            'plant_id' => $this->plant_id,
            'title' => $this->title,
            'content' => $this->content
        ]);

        session()->flash('message', 'Data konten berhasil diperbarui');

        return redirect()->route('contents.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->get();

        return view('livewire.article.update', compact('plants'));
    }
}
