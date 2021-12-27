<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function propertyInquiry(Request $request, $property_id)
    {
        $request->validate([
            'name'=>'required|max:255',
            'phone'=>'required|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required|max:255'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message.'\n This message has been sent via'.route('singleProperty',$property_id).' website';
        $contact->save();

        return redirect(route('singleProperty',$property_id));
    }
}
