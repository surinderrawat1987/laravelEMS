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
        $offCats = DB::table('site_data')->select('id','value')->where('attribute', 'Office Category')
        ->where('parent_id',0)
        ->get();
        return view('sitedata.create',['attributes' => $attributes, 'offCats' => $offCats]);

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

        $ofcCat->parent_id = ($request->get('officecategory') != null)?$request->get('officecategory'):0;
        
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
        $offCats = DB::table('site_data')->select('id','value')->where('attribute', 'Office Category')->get();

        $row = DB::table('site_data')->select('id','attribute','value','valueT', 'parent_id')->where('id', '=', $id)->first();
        //dd($row);
        // dd($attributes);
        return view('sitedata.edit',['row' => $row,'attributes' => $attributes, 'offCats' => $offCats]);

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
        $ofcCat->parent_id = $request->officecategory;
        $ofcCat->save();
        //dd($id);
        return redirect('/sitedata')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sitedata::destroy($id);
        return redirect('/sitedata')->with('success', 'Deleted successfully');
    }
}
