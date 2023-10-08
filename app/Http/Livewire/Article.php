<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Article extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];
    public $limitPerPage = 5;

    public function destroy($id)
    {
        \App\Models\Article::destroy($id);

        session()->flash('message', 'Data konten berhasil dihapus.');

        return redirect()->route('contents.index');
    }

    public function render()
    {
        $articles = \App\Models\Article::with('plant')->latest()->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $articles = \App\Models\Article::whereHas('plant', function ($query){
                return $query->where('plants.name','like', '%' . $this->search . '%')
                                ->orWhere('articles.title','like', '%' . $this->search . '%');
            })->latest()->paginate($this->limitPerPage);
        }

        return view('livewire.article', ['articles' => $articles]);
    }
}
