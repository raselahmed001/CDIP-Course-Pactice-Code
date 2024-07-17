<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact_us');
    }
    public function contact_insert(Request $request)
    {
        // dd($request->all());
        $contact_data = $request->all();
        $contact_info = new ContactInfo();

        $contact_info->name = $contact_data['fname'].' '.$contact_data['lname'];
        $contact_info->email = $contact_data['email'];
        $contact_info->message = $contact_data['message'];
        $contact_info->contact_number = $contact_data['contact_number'];
        $contact_info->save();
        return redirect()->route('contact');

    }
    
}
