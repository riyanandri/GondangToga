<?php

namespace App\Livewire;

use Livewire\Component;

class Category extends Component
{
    public function destroy($id)
    {
        \App\Models\Category::destroy($id);

        session()->flash('message', 'Data kategori berhasil dihapus.');

        return redirect()->route('categories.index');
    }

    public function render()
    {
        $categories = \App\Models\Category::latest()->get();
        // $categories = \App\Models\Category::where('name', 'like', '%' . $this->searchTerm . '%')->get();

        // if ($this->search !== null) {
        // }

        return view('livewire.category', compact('categories'));
    }
}
