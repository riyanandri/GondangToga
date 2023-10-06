<?php

namespace App\Http\Livewire\Spot;

use App\Models\Spot;
use Livewire\Component;

class Store extends Component
{
    public $plant_id;
    public $coordinate;
    public $description;

    public function store()
    {
        $rules = [
            'coordinate' => ['required']
        ];

        $this->validate($rules);

        Spot::create([
            'plant_id' => $this->plant_id,
            'coordinate' => $this->coordinate,
            'description' => $this->description??null
        ]);

        session()->flash('message', 'Data lokasi berhasil ditambahkan.');

        return redirect()->route('spots.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->get();

        return view('livewire.spot.store', compact('plants'));
    }
}
