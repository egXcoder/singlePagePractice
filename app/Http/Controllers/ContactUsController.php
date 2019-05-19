<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function sendMail(){        
        $validator = Validator::make(request()->all(),[
            'name'=> 'required|string|max:255',
            'mail'=> 'required|string|email|max:255',
            'phone'=>'required|max:255',
            'message'=>'required|string|max:5000',
        ]);  
    
        if ($validator->fails()) return $validator->getMessageBag()->all();
    
        $validated = $validator->getData();
        Mail::to("ai@wjl.sa")->send(new Message($validated));
        return redirect()->back();
    }
}