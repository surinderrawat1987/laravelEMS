<?php

namespace App\Http\Controllers;

use App\OfficeCategory;
use Illuminate\Http\Request;

class OfficeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = OfficeCategory::all();
        return view('categories.index',['cats' => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);


        if(isset($request->id) && !empty($request->id)){
            // Update case
            $ofcCat = OfficeCategory::find($request->id);
            $ofcCat->name = $request->name;
            $ofcCat->namet = $request->namet;
        } else { 
            // Insert case
            $ofcCat = new OfficeCategory([
                'name' => $request->get('name'),
                'namet' => $request->get('namet')
            ]);
        }
        
        
        $ofcCat->save();
        return redirect('/categories')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficeCategory  $officeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeCategory $officeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficeCategory  $officeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cat = OfficeCategory::find($id);
        return view('categories.edit',['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficeCategory  $officeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeCategory $officeCategory)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficeCategory  $officeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeCategory $officeCategory,$id)
    {
        $cat = OfficeCategory::find($id);
        $cat->delete();
        return redirect('/categories')->with('success', 'Category Deleted!');
    }
}
