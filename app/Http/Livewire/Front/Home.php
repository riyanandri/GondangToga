<?php

namespace App\Http\Livewire\Front;

use App\Models\Spot;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $spots = Spot::with('plant')->get();

        return view('home', ['spots' => $spots])->layout('layouts.web');
    }
}
