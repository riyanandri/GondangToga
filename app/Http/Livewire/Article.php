<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Article extends Component
{
    public function destroy($id)
    {
        \App\Models\Article::destroy($id);

        session()->flash('message', 'Data konten berhasil dihapus.');

        return redirect()->route('contents.index');
    }

    public function render()
    {
        $articles = \App\Models\Article::latest()->get();

        return view('livewire.article', compact('articles'));
    }
}
