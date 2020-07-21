<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDetailController extends Controller
{
	/**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = SiteData::get();;
        return view('userdetails.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = UserDetail::get();
        return view('userdetails.create');

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
            'staffid'=>'required'
        ]);

        if($request->get('attribute') == 'add'){
            $attribute = $request->get('newattribute');
        } else{
            $attribute = $request->get('attribute');
        }

        // Insert case
        $userDetail = new UserDetail;
            
        $userDetail->name = $name;
        $userDetail->staffid = $request->get('staffid');
        $userDetail->nameT = $request->namet;
        $userDetail->familynamet = $request->get('familynamet');

        $userDetail->parent_id = ($request->get('officecategory') != null)?$request->get('officecategory'):0;
        
        $userDetail->save();
        return redirect('/userdetails')->with('success', 'Contact saved!');
    }

}
