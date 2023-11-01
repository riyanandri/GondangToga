<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Plant;
use App\Models\Spot;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function plantDetail(Plant $plant)
    {
        $plant_id = $plant->id;

        $products = Product::where('plant_id', $plant_id)->get();

        $spots = Spot::where('plant_id', $plant_id)->first();

        return view('plant-detail', ['plant' => $plant, 'products' => $products, 'spots' => $spots]);
    }
}
