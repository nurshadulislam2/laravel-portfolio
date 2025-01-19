<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header=Header::first();
        return view('backend.pages.header', ['header'=> $header]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:100',
            'profession'=>'required|max:100'
        ]);

        $header=Header::find($id);


        if($request->image){
            $request->validate([
                'image'=>'mimes:png,jpg'
            ]);

            unlink('images/'. $header->image);
            $image=time().".". $request->image->extension();
            $request->image->move(public_path('images'), $image);
            $header->image=$image;
        }

        if($request->resume){
            $request->validate([
                'resume'=>'mimes:pdf'
            ]);

            unlink('files/'. $header->resume);
            $resume="resume".".". $request->resume->extension();
            $request->resume->move(public_path('files'), $resume);
            $header->resume=$resume;
        }

        $header->name=$request->name;
        $header->profession=$request->profession;
        $header->save();

        return redirect()->route('header.index')->with('suc', 'Header Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        //
    }
}
