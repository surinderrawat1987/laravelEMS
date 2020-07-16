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
    })
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
<h1>Edit Site static data</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action=" {{ url('/sitedata/') }}/{{ $row->id }}">
                <input  type="hidden" name="_method" value="PUT">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Site Category</label>
                    <select id="attributes" class="form-control" name="attribute" >
                        <option value="">Select Category</option>
                        @foreach ($attributes as $attribute)
                            <option value="{{$attribute->attribute}}" @if ( $attribute->attribute == $row->attribute) selected @endif>
                                {{$attribute->attribute}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style='display:none' id="newattributeDiv">
                    <label for="exampleInputEmail1">Site Category name</label>
                    <input type="text" name="newattribute" class="form-control" id="newattribute" placeholder="Enter Site category name" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Site category value" value="{{$row->value}}">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputNamet">NameT</label>
                    <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter Site category value in Tibetan" value="{{$row->valueT}}">
                    
                </div>
                <input type="hidden" name="entity" value="sitedata" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
