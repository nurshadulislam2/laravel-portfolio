<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about=About::first();
        return view('backend.pages.about', ['about'=> $about]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'description'=>'required'
        ]);

        $about=About::find($id);
        $about->description=$request->description;
        $about->save();

        return redirect()->back()->with('suc', 'About Update Successfully');
    }
}
