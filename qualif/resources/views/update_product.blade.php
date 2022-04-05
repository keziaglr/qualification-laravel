@extends('template')

@section('content')
    <form action="{{ url('product/update/'.$product->id) }}" style="margin: 50px 100px" method="POST">
        {{csrf_field()}}
        <legend> <strong class="d-flex justify-content-center">Update product</strong> </legend>
        @if ($errors->any())
            <div class="alert alert-dismissible alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="{{$product->name}}">
                <label for="floatingInput">Soap Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="product_price" placeholder="product Price" name="product_price" value="{{$product->price}}">
                <label for="floatingInput">Soap Price</label>
            </div>
            <div class="form-group">
                <label for="exampleSelect1" class="form-label mt-4">Soap Type</label>
                <select class="form-select" id="exampleSelect1" name="product_type" value="{{$product->producttype->name}}">
                    @foreach ($producttypes as $producttype)
                        <option value="{{$producttype->name}}">{{$producttype->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Soap Description</label>
                <textarea class="form-control" id="exampleTextarea" rows="4" name="product_desc">{{$product->description}}</textarea>
            </div>
        </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Insert">
    </form>
@endsection
