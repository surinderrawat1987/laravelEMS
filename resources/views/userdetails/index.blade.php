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
            @foreach($users as $user)
                
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['user_detail']['staffid']}}</td>
                    <td>{{$user['user_detail']['gender']}}</td>
                    <td>{{$user['user_detail']['dob']}}</td>
                    <td>{{$user['user_detail']['department']['value']}}</td>
                    <td>{{$user['user_detail']['designation']['value']}}</td>
                    <td>{{$user['user_detail']['appointment']['value']}}</td>

                    <td>{{date('d-M-Y H:i:a',strtotime($user['created_at']))}}</td>
                    <td>
                        <a href="{{url('/userdetails/')}}/{$userDetail['id']}}/edit">edit</a>/
                        <form method="POST" action="{{ url('/userdetails/')}}/{$userDetail['id']}}">
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
