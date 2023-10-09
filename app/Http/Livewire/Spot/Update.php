<?php

namespace App\Http\Livewire\Spot;

use App\Models\Spot;
use Livewire\Component;

class Update extends Component
{
    public $spotId;
    public $plant_id;
    public $coordinate;
    public $description;

    public function mount($id)
    {
        $spot = Spot::findOrFail($id);

        $this->spotId = $spot->id;
        $this->plant_id = $spot->plant_id;
        $this->coordinate = $spot->coordinate;
        $this->description = $spot->description;
    }

    public function update()
    {
        $rules = [
            'coordinate' => ['required']
        ];

        $messages = [
            'coordinate.required' => 'Titik koordinat belum diisi.'
        ];

        $this->validate($rules, $messages);

        $spot = Spot::findOrFail($this->spotId);

        $spot->update([
            'plant_id' => $this->plant_id,
            'coordinate' => $this->coordinate,
            'description' => $this->description??null
        ]);

        session()->flash('message', 'Data lokasi berhasil diperbarui.');

        return redirect()->route('spots.index');
    }

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->get();

        return view('livewire.spot.update', compact('plants'));
    }
}
