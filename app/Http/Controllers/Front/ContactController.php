<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Mail\ContactMail;
use App\Mail\Websitemail;
use App\Models\Page;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        $page_data = Page::where('id', 1)->first();
        return view('front.pages.contact', compact('page_data'));
    }

    public function send_email(Request $request){
        $datalis = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
            // Send email
            // $admin_data = Admin::where('id', $request->email)->first();
            Mail::to('abdelmjid999@gmail.com')->send(new ContactMail($datalis));
            return back()->with('message_sent', 'Email sent');
    }
}
