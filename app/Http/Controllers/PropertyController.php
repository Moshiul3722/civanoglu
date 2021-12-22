<?php

namespace App\Http\Controllers;
use App\Models\Property;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function singleProperty($id)
    {
        $property = Property::findOrFail($id);
        return view('property.single',['property'=>$property]);
    }
}
