@extends('template')

@section('content')
    <div style="margin: 50px 100px">
        <legend> <strong class="d-flex justify-content-center" >My Wishlist</strong> </legend>

        <div style="margin-top: 50px">
            <div class="row" style="justify-content:space-evenly">
                @foreach ($wishlist as $w)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$w->product->name}}</h5>
                            <p class="card-text">{{$w->product->description}}</p>
                            <div class="row">
                                @if (auth()->user()->role == 'user')
                                    @if($currUser->wishlist->where('product_id', '=', $w->product->id)->first() != NULL)
                                        <a href="{{url('wishlist/remove/'.$w->product->id)}}" class="btn btn-outline-danger" style="margin-bottom: 20px">Remove to Wishlist</a>
                                    @else
                                        <a href="{{url('wishlist/insert/'.$w->product->id)}}" class="btn btn-outline-primary" style="margin-bottom: 20px">Add to Wishlist</a>
                                    @endif
                                    <a href="{{url('product/detail/'.$w->product->id)}}" class="btn btn-secondary">Details</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
@endsection
