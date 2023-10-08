<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Plant extends Component
{
    public $search;
    protected $queryString = ['search'=> ['except' => '']];
    public $limitPerPage = 12;

    public function render()
    {
        $plants = \App\Models\Plant::orderBy('name', 'ASC')->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $plants = \App\Models\Plant::where('name','like', '%' . $this->search . '%')
            ->orderBy('name', 'ASC')->paginate($this->limitPerPage);
        }

        return view('plant', ['plants' => $plants])->layout('layouts.web');
    }
}
