@extends('template')

@section('content')
    <div style="margin: 50px 100px">
        <legend> <strong class="d-flex justify-content-center" >Product Detail</strong> </legend>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Soap Name</label>
            <div class="col-sm-10">
                <input type="text" readonly="" class="form-control-plaintext" id="name" value="{{$product->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Soap Name</label>
            <div class="col-sm-10">
                <input type="text" readonly="" class="form-control-plaintext" id="price" value="{{$product->price}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Soap Type</label>
            <div class="col-sm-10">
                <input type="text" readonly="" class="form-control-plaintext" id="type" value="{{$product->producttype->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="desc" class="col-sm-2 col-form-label">Soap Description</label>
            <div class="col-sm-10">
                <input type="text" readonly="" class="form-control-plaintext" id="desc" value="{{$product->description}}">
            </div>
        </div>
    </div>
@endsection
