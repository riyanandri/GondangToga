<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];
    public $limitPerPage = 5;

    public function destroy($id)
    {
        \App\Models\Category::destroy($id);

        session()->flash('message', 'Data kategori berhasil dihapus.');

        return redirect()->route('categories.index');
    }

    public function render()
    {
        $categories = \App\Models\Category::orderBy('name', 'ASC')->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $categories = \App\Models\Category::where('name','like', '%' . $this->search . '%')
            ->orderBy('name', 'ASC')->paginate($this->limitPerPage);
        }

        return view('livewire.category', ['categories' => $categories]);
    }
}
