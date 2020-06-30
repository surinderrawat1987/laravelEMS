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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);
        $contact = new Contact([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'job_title' => $request->get('job_title'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved!');
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
    public function edit(OfficeCategory $officeCategory)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficeCategory  $officeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeCategory $officeCategory)
    {
        //
    }
}
