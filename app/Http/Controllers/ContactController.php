<?php

namespace App\Http\Controllers;
use App\mail\contact;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function view() 
    { 
        return view ('contact');


        

        
    }

    public function store(Request $request)
    {

    $data= $request->validate([
      
      'name'=>'required',
      'email'=>'required | email' ,
      'subject'=>'required',
      'message'=>'required',
    
    ]);




    return redirect(route('contact.view'))->with('status', 'thank you.. we  will get in touch soon');

    
}

}
