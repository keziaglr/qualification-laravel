<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //
    public function index(){
        $currUser = User::where('id', auth()->user()->id)->first();
        $wishlist = $currUser->wishlist;
//        dd($products);
        return view('wishlist')->with('wishlist', $wishlist)->with('currUser', $currUser);
    }

    public function addToWishlist(Request $request)
    {
        Wishlist::create([
            'product_id' => $request->route('id'),
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back();
    }

    public function removeFromWishlist(Request $request)
    {
        Wishlist::where('product_id', $request->route('id'))->delete();
        return redirect()->back();
    }
}
