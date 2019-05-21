<?php

namespace App\Http\Controllers;

use Notification;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ContactUs;
use App\User;

class ContactUsController extends Controller
{
    public function sendMail()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->all();
        }
        $validated = $validator->getData();

        $user = User::find(1);
        $user->notify(new ContactUs($validated));
        return redirect()->back();
    }
}
