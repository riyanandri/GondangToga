<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Plant extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];

    public function destroy($id)
    {
        \App\Models\Plant::destroy($id);

        session()->flash('message', 'Data tanaman berhasil dihapus.');

        return redirect()->route('plants.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::with('category')->latest()->get();

        if ($this->search !== null) {
            $plants = \App\Models\Plant::whereHas('category', function ($query){
                return $query->where('plants.name','like', '%' . $this->search . '%')
                                ->orWhere('plants.latin','like', '%' . $this->search . '%');
            })->latest()->get();
        }

        return view('livewire.plant', ['plants' => $plants]);
    }
}
