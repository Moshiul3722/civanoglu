<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProperties = Property::latest()->get()->take(4);
        // echo'<pre>';
        // dd($latestProperties->gallery()->count());
        // print_r($latestProperties);
        // $data = 'This is moshiul';
        return view ('welcome',[
            'latestProperties'=> $latestProperties
        ]);
    }
}
