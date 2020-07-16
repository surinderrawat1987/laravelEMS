<?php

namespace App\Http\Controllers;

use App\SiteData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = SiteData::where('entity','sitedata')->get();;
        return view('sitedata.index',['cats' => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = DB::table('site_data')->select('attribute')->groupBy('attribute')->get();
        return view('sitedata.create',['attributes' => $attributes]);
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
            'name'=>'required',
            'attribute'=>'required'
        ]);

        if($request->get('attribute') == 'add'){
            $attribute = $request->get('newattribute');
        } else{
            $attribute = $request->get('attribute');
        }

        // Insert case
        $ofcCat = new SiteData;
            
        $ofcCat->attribute = $attribute;
        $ofcCat->value = $request->get('name');
        $ofcCat->valueT = $request->namet;
        $ofcCat->entity = $request->get('entity');
       
        
        $ofcCat->save();
        return redirect('/sitedata')->with('success', 'Contact saved!');
    }

    public function test(){
        // this is just to check a commit and git logic
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function show(SiteData $siteData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //dd($id);
        $attributes = DB::table('site_data')->select('attribute')->groupBy('attribute')->get();

        $row = DB::table('site_data')->select('id','attribute','value','valueT')->where('id', '=', $id)->first();
        //dd($row);
        // dd($attributes);
        return view('sitedata.edit',['row' => $row,'attributes' => $attributes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $ofcCat = SiteData::find($id);

        
        $ofcCat->value = $request->name;
        $ofcCat->valueT = $request->namet;
        $ofcCat->save();
        //dd($id);
        $attributes = DB::table('site_data')->select('attribute')->groupBy('attribute')->get();

        $row = DB::table('site_data')->select('id','attribute','value','valueT')->where('id', '=', $id)->first();
        return view('sitedata.edit',['row' => $row,'attributes' => $attributes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteData $siteData)
    {
        //
    }
}
