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
        <h1>Office Category Listing</h1>
        <br \>
        <br \>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Categories</th>
                    <th>Name</th>
                    <th>Name T</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @php
            $i = 1;
            @endphp
            @foreach($cats as $cat)
                
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$cat->attribute}}</td>
                    <td>{{$cat->value}}</td>
                    <td>{{$cat->valueT}}</td>
                    <td>{{date('d-M-Y H:i:a',strtotime($cat->created_at))}}</td>
                    <td>
                        <a href="{{url('/sitedata/')}}/{{$cat->id}}/edit">edit</a>/
                        <form method="POST" action="{{ url('/sitedata/')}}/{{$cat->id}}">
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
