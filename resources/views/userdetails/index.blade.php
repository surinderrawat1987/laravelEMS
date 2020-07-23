@extends('layouts.admin')

@section('script')
<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
});
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
            @foreach($users as $user)
                
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->username->name}}</td>
                    <td>{{$user->staffid}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->department->value}}</td>
                    <td>{{$user->designation->value}}</td>
                    <td>{{$user->appointment->value}}</td>

                    <td>{{date('d-M-Y H:i:a',strtotime($user->created_at))}}</td>
                    <td>
                        <a href="{{url('/userdetails/')}}/{{$user->id}}/edit">edit</a>/
                        <form method="POST" action="{{ url('/userdetails/')}}/{{$user->id}}">
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
