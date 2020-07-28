@extends('layouts.admin')

@section('script')
<script type="text/javascript">
// $(document).ready( function () {
//     $('#table').DataTable();
// });

$(document).ready(function() {
    $('#table').DataTable( {
        // "processing": true,
        "serverSide": true,
        "ajax": 'http://localhost/laravelEMS/public/userlist',
        "lengthMenu": [[1, 2, 5, -1], [1, 2, 5, "All"]]
    });
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
                    
                    <th>Name</th>
                    <th>Staff ID</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>First Department</th>
                    <th>First Designation</th>
                    <th>First Appoinment Category</th>
                    <th>Date Created</th>
                    
                </tr>
            </thead>
           
        </table>
            
        </div>
    </div>
</div>
@endsection
