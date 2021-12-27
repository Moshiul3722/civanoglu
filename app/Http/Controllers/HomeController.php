<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProperties = Property::latest()->get()->take(4);
        $locations = Location::select(['id','name'])->get();
        return view ('welcome',[
            'latestProperties'=> $latestProperties,
            'locations'=>$locations
        ]);
    }
}
