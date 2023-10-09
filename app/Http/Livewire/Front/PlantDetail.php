<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class PlantDetail extends Component
{
    public function render()
    {
        return view('plant-detail')->layout('layouts.web');
    }
}
