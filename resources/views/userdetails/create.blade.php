@extends('layouts.admin')

@section('script')
<script>
    $(document).ready(function(){
        $("#attributes").change(function(){
            if($(this).val() == 'add'){
                $("#newattributeDiv").slideDown();
            } else {
                $("#newattributeDiv").slideUp();
            }
        })
        $("#attributes").change(function(){
            if($(this).val() == 'Department'){
                $("#officecategoryDiv").slideDown();
            } else {
                $("#officecategoryDiv").slideUp();
            }
        })
    })
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
<h1>Insert User Details</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/laravelEMS/public/userdetails" accept-charset="UTF-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter the Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Staff ID</label>
                            <input type="text" name="staffid" class="form-control" id="staffid" aria-describedby="emailHelp" placeholder="Enter the staff ID">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">NameT</label>
                            <input type="text" name="namet" class="form-control" id="namet" aria-describedby="emailHelp" placeholder="Enter the Name in Tibetan">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">DOB</label>
                            <input type="date" name="dob" class="form-control" id="dob" aria-describedby="emailHelp" placeholder="Enter the date of birth">  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">Gender</label>
                            <select id ="gender" class="form-control" name="gender" >
                                    <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Father Name</label>
                            <input type="text" name="fname" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="Enter your Father name">
                            @csrf

                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Place</label>
                            <input type="text" name="birthplace" class="form-control" id="birthplace" aria-describedby="emailHelp" placeholder="Enter the name of Birth Place">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Mother Name</label>
                            <input type="text" name="mname" class="form-control" id="mname" aria-describedby="emailHelp" placeholder="Enter your Mother name">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Father NameT</label>
                            <input type="text" name="fnamet" class="form-control" id="fnamet" aria-describedby="emailHelp" placeholder="Enter Father Name  in Tibetan">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Family Name</label>
                            <input type="text" name="familyname" class="form-control" id="familyname" aria-describedby="emailHelp" placeholder="Enter the Family Name">
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">Mother NameT</label>
                            <input type="text" name="mnamet" class="form-control" id="mnamet" aria-describedby="emailHelp" placeholder="Enter Mother Name  in Tibetan">
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputNamet">Family NameT</label>
                            <input type="text" name="familynamet" class="form-control" id="familynamet" aria-describedby="emailHelp" placeholder="Enter Family name in Tibetan">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mother GB</label>
                            <input type="text" name="mgb" class="form-control" id="mgb" aria-describedby="emailHelp" placeholder="Enter Mother's GB number">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">First Appintment Date</label>
                            <input type="date" name="fad" class="form-control" id="fad" aria-describedby="emailHelp" placeholder="Enter the Date of Appintment">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">Father GB</label>
                            <input type="text" name="fgb" class="form-control" id="fgb" aria-describedby="emailHelp" placeholder="Enter Father's GB number">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Designation</label>
                                <select id="designation" class="form-control" name="designation" >
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->value}}</option>
                                    @endforeach
                                </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Department</label>
                                <select id="department" class="form-control" name="department" >
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->value}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">Probation Start Date</label>
                            <input type="date" name="probationstart" class="form-control" id="probationstart" aria-describedby="emailHelp" placeholder="Enter the start of Probation Date">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Appointment Categoery</label>
                                <select id="appointmentcat" class="form-control" name="appointmentcat" >
                                    <option value="">Select Appointment Categoery</option>
                                    @foreach ($appointmentcats as $appointmentcat)
                                        <option value="{{$appointmentcat->id}}">{{$appointmentcat->value}}</option>
                                    @endforeach
                                </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Probation End Date</label>
                            <input type="date" name="probationend" class="form-control" id="probationend" aria-describedby="emailHelp" placeholder="Enter the end of Probation Date">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">RC Number</label>
                            <input type="text" name="rcno" class="form-control" id="rcno" aria-describedby="emailHelp" placeholder="Enter your RC Nubmer">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Passport Number</label>
                            <input type="text" name="passno" class="form-control" id="passno" aria-describedby="emailHelp" placeholder="Enter your Passport Number">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputNamet">GB Number</label>
                            <input type="text" name="gbno" class="form-control" id="gbno" aria-describedby="emailHelp" placeholder="Enter your GB Number">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Phone Number</label>
                            <input type="text" name="phoneno" class="form-control" id="phoneno" aria-describedby="emailHelp" placeholder="Enter your Phone Number">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">DOS Validity Date</label>
                            <input type="date" name="dosdate" class="form-control" id="dosdate" aria-describedby="emailHelp" placeholder="Enter Department of Security Validity Date">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Honour Name</label>
                            <select id="honour" class="form-control" name="honour" >
                                    <option >Select Designation</option>
                                    @foreach ($honours as $honour)
                                        <option value="{{$honour->id}}">{{$honour->value}}</option>
                                    @endforeach
                                </select>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputNamet">Leaving Date</label>
                            <input type="date" name="leavingdate" class="form-control" id="leavingdate" aria-describedby="emailHelp" placeholder="Enter the Date of leaving Office">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Honour Date</label>
                            <input type="date" name="honourdate" class="form-control" id="honourdate" aria-describedby="emailHelp" placeholder="Enter the Date of Honour">
                            @csrf

                        </div>   
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Insert the Profile Image">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Email</label>
                            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter the email">
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                         
                        <div class="form-group">
                            <label for="exampleInputNamet">Remarks</label>
                            <input type="text" name="remarks" class="form-control" id="remarks" aria-describedby="emailHelp" placeholder="Enter the Remarks">
                            
                        </div>
                        
                    </div>
                </div>
                <input type="hidden" name="entity" value="sitedata" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
