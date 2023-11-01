<?php

namespace App\Http\Livewire\Front;

use App\Models\Plant;
use Livewire\Component;

class PlantDetail extends Component
{
    public function mount($slug)
    {
        $plant = Plant::where('slug', $slug)->first();
        if (!$plant) {
            abort(404);
        }
    }
    
    public function render($id)
    {
        $data = Plant::where('id', $id)->first();
        if (!$data) {
            abort(404);
        }
        // $data = Plant::where('id', $id)->first();
        return view('plant-detail', ['data' => $data])->layout('layouts.web');
    }
}
