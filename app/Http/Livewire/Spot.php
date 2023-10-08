<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Spot extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];

    public function destroy($id)
    {
        \App\Models\Spot::destroy($id);

        session()->flash('message', 'Data lokasi berhasil dihapus.');

        return redirect()->route('spots.index');
    }

    public function render()
    {
        $spots = \App\Models\Spot::with('plant')->latest()->get();

        if ($this->search !== null) {
            $spots = \App\Models\Spot::whereHas('plant', function ($query){
                return $query->where('plants.name','like', '%' . $this->search . '%')
                                ->orWhere('spots.coordinate','like', '%' . $this->search . '%');
            })->latest()->get();
        }

        return view('livewire.spot', ['spots' => $spots]);
    }
}
