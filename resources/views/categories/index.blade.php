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
        <table id="table" class="">
            <thead>
                <tr>
                    <th>Sr No</th>
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
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->namet}}</td>
                    <td>{{date('d-M-Y H:i:a',strtotime($cat->created_at))}}</td>
                    <td>
                        <a href="{{url('/categories/')}}/{{$cat->id}}/edit">edit</a>/
                        <form method="POST" action="{{ url('/categories/')}}/{{$cat->id}}">
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
