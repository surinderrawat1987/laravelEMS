@extends('layouts.admin')

@section('script')
<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
});

// $(document).ready(function() {
//     $('#table').DataTable( {
//         "ajax": '../ajax/data/arrays.txt'
//     });
// });
</script>
@endsection

@section('content')
<style>
.delete{
    border: none;
    background: white;
    color: blue;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>Users Listing</h1>
        <br \>
        <br \>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Staff ID</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>First Department</th>
                    <th>First Designation</th>
                    <th>First Appoinment Category</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
            $i = 1;
            @endphp
            @foreach($userDetails as $userDetail)
                
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$userDetail->user->name}}</td>
                    <td>{{$userDetail->staffid}}</td>
                    <td>{{$userDetail->gender}}</td>
                    <td>{{$userDetail->dob}}</td>
                    <td>{{$userDetail->department->value}}</td>
                    <td>{{$userDetail->designation->value}}</td>
                    <td>{{$userDetail->appointment->value}}</td>

                    <td>{{date('d-M-Y H:i:a',strtotime($userDetail->created_at))}}</td>
                    <td>
                        <a href="{{url('/userdetails/')}}/{$userDetail->id}}/edit">edit</a>/
                        <form method="POST" action="{{ url('/userdetails/')}}/{$userDetail->id}}">
                            @csrf
                            <input  type="hidden" name="_method" value="DELETE">
                            <input class='delete' type="submit" value="delete">
                        </form>
                    </td>
                </tr>
                @php
                $i++;
                @endphp
            @endforeach
        </table>
            
        </div>
    </div>
</div>
@endsection
