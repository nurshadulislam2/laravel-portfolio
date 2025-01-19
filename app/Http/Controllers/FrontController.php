<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Header;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){
        $header=Header::first();
        $about=About::first();
        $portfolios=Portfolio::latest()->get();
        return view('frontend.index', ['header'=>$header, 'portfolios'=>$portfolios, 'about'=>$about]);
    }

    public function contact(Request $request){
        $request->validate([
            'name'  =>  'required',
            'email' =>'required|email',
            'message'=>'required'
        ]);


        $mailData=[
            'name'=> $request->name,
            'message'=>$request->message,
            'email'=> $request->email
        ];

        Mail::to('nurshadul.islam.2018@gmail.com')->send(new ContactMail($mailData));

        return redirect()->back()->with('suc', "Message Send Successfully");
    }
}
