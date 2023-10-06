<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Spot extends Component
{
    public function destroy($id)
    {
        \App\Models\Spot::destroy($id);

        session()->flash('message', 'Data lokasi berhasil dihapus.');

        return redirect()->route('spots.index');
    }

    public function render()
    {
        $spots = \App\Models\Spot::latest()->get();

        return view('livewire.spot', compact('spots'));
    }
}
