<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Plant extends Component
{
    public function destroy($id)
    {
        \App\Models\Plant::destroy($id);

        session()->flash('message', 'Data tanaman berhasil dihapus.');

        return redirect()->route('plants.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::with('category')->latest()->get();

        return view('livewire.plant', compact('plants'));
    }
}
