@extends('template')

@section('content')
    <div style="margin: 50px 100px">
        <legend> <strong class="d-flex justify-content-center" >Home</strong> </legend>
        <form action="/home" class="d-flex justify-content-center;" style="margin: 50px 300px" >
            <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="I want to buy..">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        @if (auth()->user()->role == "admin")
            <div class="d-flex justify-content-center">
                <a href="{{url('product/insert')}}" type="submit" class="btn btn-primary">Insert Product</a>
            </div>
        @endif

        <div style="margin-top: 50px">
            <div class="row" style="justify-content:space-evenly">
                @foreach ($products as $product)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <div class="row">
                                @if (auth()->user()->role == 'user')
                                    @if($currUser->wishlist->where('product_id', '=', $product->id)->first() != NULL)
                                        <a href="{{url('wishlist/remove/'.$product->id)}}" class="btn btn-outline-danger" style="margin-bottom: 20px">Remove to Wishlist</a>
                                    @else
                                        <a href="{{url('wishlist/insert/'.$product->id)}}" class="btn btn-outline-primary" style="margin-bottom: 20px">Add to Wishlist</a>
                                    @endif
                                    <a href="{{url('product/detail/'.$product->id)}}" class="btn btn-secondary">Details</a>
                                @endif
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{url('product/update/'.$product->id)}}" class="btn btn-warning" style="margin-bottom: 20px">Update</a>
                                    <a href="{{url('product/delete/'.$product->id)}}" class="btn btn-danger">Delete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                <div style="justify-content:space-around; margin-top:50px" >
                    <div>
                        <div class="d-flex justify-content-center">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{$products->previousPageUrl()}}">&laquo;</a>
                                </li>
                                @for($i = 1; $i <= $products->lastPage(); $i++)
                                    @if($i == $products->currentPage())
                                        <li class="page-item active">
                                            <a class="page-link" href="#">{{$i}}</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{$products->url($i)}}">{{$i}}</a>
                                        </li>
                                    @endif
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{$products->nextPageUrl()}}">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
