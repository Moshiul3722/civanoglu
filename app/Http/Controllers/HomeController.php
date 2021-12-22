<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProperties = Property::all();
        // echo'<pre>';
        // print_r($latestProperties);
        // $data = 'This is moshiul';
        return view ('welcome',[
            'latestProperties'=> $latestProperties
        ]);
    }
}
