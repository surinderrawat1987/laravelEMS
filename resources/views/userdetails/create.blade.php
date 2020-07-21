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
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Name">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Staff ID</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the staff ID">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">NameT</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the Name in Tibetan">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">DOB</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the date of birth">  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Gender">
                            @csrf
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Father Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Father name">
                            @csrf

                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Place</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the name of Birth Place">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Mother Name</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter your Mother name">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Father NameT</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Father Name  in Tibetan">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Family Name</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the Family Name">
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">Mother NameT</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter Mother Name  in Tibetan">
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputNamet">Family NameT</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter Family name in Tibetan">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mother GB</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mother's GB number">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">First Appintment Date</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the Date of Appintment">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputNamet">Father GB</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter Father's GB number">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Designation</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Designation">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Department</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the name of Department">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Probation Start Date</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the start of Probation Date">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Appointment Categoery</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Category">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Probation End Date</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the end of Probation Date">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">RC Number</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your RC Nubmer">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Passport Number</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Passport Number">
                            @csrf

                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputNamet">GB Number</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter your GB Number">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Phone Number</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter your Phone Number">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">DOS Validity Date</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Department of Security Validity Date">
                            @csrf

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamet">Honour Name</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the name of Honour">
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputNamet">Leaving Date</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the Date of leaving Office">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Honour Date</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Date of Honour">
                            @csrf

                        </div>   
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insert the Profile Image">
                            @csrf

                        </div>
                        
                    </div>
                    <div class="col-md-6">
                         
                        <div class="form-group">
                            <label for="exampleInputNamet">Remarks</label>
                            <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter the Remarks">
                            
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
