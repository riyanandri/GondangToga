<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Plant extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];
    public $limitPerPage = 5;

    public function destroy($id)
    {
        \App\Models\Plant::destroy($id);

        session()->flash('message', 'Data tanaman berhasil dihapus.');

        return redirect()->route('plants.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::with('category')->orderBy('name', 'ASC')->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $plants = \App\Models\Plant::whereHas('category', function ($query){
                return $query->where('plants.name','like', '%' . $this->search . '%')
                                ->orWhere('plants.latin','like', '%' . $this->search . '%');
            })->orderBy('plants.name', 'ASC')->paginate($this->limitPerPage);
        }

        return view('livewire.plant', ['plants' => $plants]);
    }
}
