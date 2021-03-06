<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserDetails;


class UserDetailController extends Controller
{
	/**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userDetails = UserDetail::with('user','department','designation','appointment')->get();
        
        //dd($users[0]->appointmentcategory->value);
        $users = new UserCollection(User::with('userDetails','userDetails.department','userDetails.designation','userDetails.appointment')->paginate(1));
        $usersdata = $users->toArray('');
        //dd($users);
        return view('userdetails.index',['users' => $usersdata]);
        
    }

    public function getUserList(Request $request){
        $noOfRecordsPerPage = $request->length;
        $offset = $request->start;
        if($noOfRecordsPerPage>0){
            $userReacords = new UserCollection(User::with('userDetails','userDetails.department','userDetails.designation','userDetails.appointment')->skip($offset)->take($noOfRecordsPerPage)->get());
        } else {
            $userReacords = new UserCollection(User::with('userDetails','userDetails.department','userDetails.designation','userDetails.appointment')->get());
        }
        
        $usersdata = $userReacords->toArray('');
        
        foreach ($usersdata as $key => $value) {
            $users['data'][$key][] = $value['name'];
            $users['data'][$key][] = $value['user_details']['staffid'];
            $users['data'][$key][] = $value['user_details']['gender'];
            $users['data'][$key][] = $value['user_details']['dob'];
            $users['data'][$key][] = $value['user_details']['department']['value'];
            $users['data'][$key][] = $value['user_details']['designation']['value'];
            $users['data'][$key][] = $value['user_details']['appointment']['value'];
            $users['data'][$key][] = $value['created_at'];
        }
        $users['draw'] = $request->draw;
        $users['recordsTotal'] = 5;
        $users['recordsFiltered'] = 5;

        return json_encode($users);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = DB::table('site_data')->select('id','value')->where('attribute', 'Department')->get();
        $designation = DB::table('site_data')->select('id','value')->where('attribute', 'Designation')->get();
        $appointmentcat = DB::table('site_data')->select('id','value')->where('attribute', 'Appointment Category')->get();
        $honour = DB::table('site_data')->select('id','value')->where('attribute', 'Honour')->get();
        // dd($honour);
        return view('userdetails.create',['departments' => $department, 'designations' => $designation, 'appointmentcats' => $appointmentcat, 'honours' => $honour]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new \App\User();
        $user->password = \Hash::make('12345');
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->active_for_login = 0;
        $user->mainstatus_id = $this->mainstsatus['INSERVICE'];
        $user->save();

        $request->validate([
            // 'name'=>'required',
            // 'staffid'=>'required',
            // 'gender'=>'required',
            // 'dob'=>'required',
            // 'birthplace'=>'required',
            // 'fathername'=>'required',
            // 'mothername'=>'required',
            // 'firstdepartment'=>'required',
            // 'firstdesignation'=>'required',
            // 'pfrom'=>'required',
            // 'pto'=>'required',
            // 'firstappointmentdate'=>'required',
            // 'rc'=>'required',
            // 'gb'=>'required',
            // 'phone'=>'required',
            // 'appointmentcategory'=>'required'
        ]);

        // Insert case
        $userDetail = new UserDetail;
        $userDetail->user_id = $user->id;
        //$userDetail->name = $name;
        $userDetail->staffid = $request->get('staffid');
        $userDetail->namet = $request->get('namet');
        $userDetail->familynamet = $request->get('familynamet');
        $userDetail->fathernamet = $request->get('fnamet');
        $userDetail->mothernamet = $request->get('mnamet');
        $userDetail->familyname = $request->get('familyname');
        $userDetail->gender = $request->get('gender');
        $userDetail->dob = $request->get('dob');
        $userDetail->birthplace = $request->get('birthplace');
        $userDetail->fathername = $request->get('fname');
        $userDetail->mothername = $request->get('mname');
        $userDetail->fathergb = $request->get('fgb');
        $userDetail->mothergb = $request->get('mgb');
        $userDetail->firstdepartment = $request->get('department');
        $userDetail->firstdesignation = $request->get('designation');
        $userDetail->pfrom = $request->get('probationstart');
        $userDetail->pto = $request->get('probationend');
        $userDetail->firstappointmentdate = $request->get('fad');
        $userDetail->rc = $request->get('rcno');
        $userDetail->gb = $request->get('gbno');
        $userDetail->passport = $request->get('passno');
        $userDetail->phone = $request->get('phoneno');
        $userDetail->appointmentcategory = $request->get('appointmentcat');
        $userDetail->leavingdate = $request->get('leavingdate');
        $userDetail->dosvaliditydate = $request->get('dosdate');
        $userDetail->remarks = $request->get('remarks');
        $userDetail->honour_id = $request->get('honour');
        $userDetail->honour_date = $request->get('honourdate');
        
        $userDetail->save();
        // dd(DB::getQueryLog());
        return redirect('/userdetails')->with('success', 'Contact saved!');
    }

    public function destroy($id)
    {
        UserDetail::destroy($id);
        return redirect('/userdetails')->with('success', 'Deleted successfully');
    }

}
