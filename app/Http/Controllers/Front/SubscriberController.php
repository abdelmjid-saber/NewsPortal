<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);
        $token = hash('sha256', time());
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->token = $token;
        $subscriber->status = 'Pending';
        $subscriber->save();

        // sent email
        $subject = 'Subscriber Email Verify';
        $verifivation_link = url('subscriber/verify/' . $token . '/' . $request->email);
        $message = 'Please click on the following link in order to verify as subscriber <br>';
        $message .= '<a href="' . $verifivation_link . '">Click here</a>';
        Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->back()->with('message_sent', 'Please cheach your email address to verify as subscriber');
    } 

    public function verify($token, $email) {
        $subscriber_data =Subscriber::where('token', $token)->where('email', $email)->first();
        if($subscriber_data){
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();
            return redirect()->back()->with('success', 'You Are successfully verified as a subscriber to this system');
        } else {
            return redirect()->route('home');
        }
    }
}
