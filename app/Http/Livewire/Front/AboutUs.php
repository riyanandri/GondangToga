<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        return view('about-us')->layout('layouts.web');
    }
}
