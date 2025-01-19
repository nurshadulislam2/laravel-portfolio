<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios=Portfolio::latest()->get();
        return view('backend.pages.portfolio.index', ['portfolios'=>$portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.pages.portfolio.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'description'=>'required',
            'link'=>'required'
        ]);

        $image=time().'.'. $request->image->extension();
        $request->image->move(public_path('images'), $image);

        $portfolio=new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->link = $request->link;
        $portfolio->image = $image;
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('suc','Portfolio Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $portfolio= Portfolio::find($id);
        return view('backend.pages.portfolio.edit', ['portfolio'=>$portfolio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'link'=>'required'
        ]);

        $portfolio=Portfolio::find($id);

        if($request->image){
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg'
            ]);

            unlink('images/'.$portfolio->image);
            $image=time().'.'. $request->image->extension();
            $request->image->move(public_path('images'), $image);
            $portfolio->image = $image;
        }


        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->link = $request->link;
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('suc','Portfolio Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portfolio= Portfolio::find($id);
        unlink('images/'. $portfolio->image);
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('suc','Portfolio Delete Successfully');
    }
}
