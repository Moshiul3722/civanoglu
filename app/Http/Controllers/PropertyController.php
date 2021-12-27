<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::select(['id', 'name'])->get();
        $latestProperties = Property::latest();

        if (!empty($request->sale)) {
            $latestProperties = $latestProperties->where('sale', $request->sale);
        }
        if (!empty($request->location)) {
            $latestProperties = $latestProperties->where('location_id', $request->location);
        }

        if (!empty($request->bedrooms)) {
            $latestProperties = $latestProperties->where('bedrooms', $request->bedrooms);
        }

        if (!empty($request->property_name)) {
            $latestProperties = $latestProperties->where('name', 'LIKE','%'. $request->property_name.'%');
        }
        if (!empty($request->price)) {

            if ($request->price == '500000') {
                $latestProperties = $latestProperties->where('price', '<=', 500000);
            } elseif ($request->price == '400000') {
                $latestProperties = $latestProperties->where('price', '>', 400000)->where('price', '<=', 500000);
            } elseif ($request->price == '300000') {
                $latestProperties = $latestProperties->where('price', '>', 300000)->where('price', '<=', 400000);
            } elseif ($request->price == '200000') {
                $latestProperties = $latestProperties->where('price', '>', 200000)->where('price', '<=', 300000);
            } else {
                $latestProperties = $latestProperties->where('price', '>', 100000);
            }
        }

        $latestProperties = $latestProperties->paginate(12);

        return view('property.index', [
            'latestProperties' => $latestProperties, 'locations' => $locations
        ]);
    }

    public function singleProperty($id)
    {
        $property = Property::findOrFail($id);
        // echo '<pre>';
        // dd($property->gallery()->count());
        return view('property.single', ['property' => $property]);
    }
}
