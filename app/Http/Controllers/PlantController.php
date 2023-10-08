<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function plants()
    {
        $plants = Plant::orderBy('name', 'ASC')->paginate(2);

        return view('plant.index', [
            'plants' => $plants
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $plants = Plant::where('name', 'like', "%" . $search . "%")
                            ->orWhere('latin', 'like', "%" . $search . "%")
                            ->orderBy('name', 'ASC')->paginate();
        
        return view('plant.index', ['plants' => $plants]);
    }
}
