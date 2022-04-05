<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Producttype;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function showInsertForm()
    {
        $producttypes = Producttype::all();
        return view('insert_product')->with('producttypes', $producttypes);
    }

    public function showUpdateForm(Request $request)
    {
        $product = Product::find($request->route('id'));
        $producttypes = Producttype::all();
        return view('update_product')->with('product', $product)->with('producttypes', $producttypes);
    }

    public function showDetail(Request $request)
    {
        $product = Product::find($request->route('id'));
        return view('product_detail')->with('product', $product);
    }

    public function insert(Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required|min:3',
            'product_type' => 'required',
            'product_price' => 'required|numeric|min:1000',
            'product_desc' => 'required|min:20|max:200',
        ]);

        //search flower type id
        $type = Producttype::where('name', $request->get('product_type'))->first();

        Product::create([
            'producttype_id' => $type->id,
            'name' => $request->product_name,
            'price' => $request->product_price,
            'description' => $request->product_desc,
        ]);
        return redirect('home');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required|min:3',
            'product_type' => 'required',
            'product_price' => 'required|numeric|min:1000',
            'product_desc' => 'required|min:20|max:200',
        ]);

        $type = Producttype::where('name', $request->get('product_type'))->first();

        Product::where('id', $request->route('id'))->update([
            'producttype_id' => $type->id,
            'name' => $request->product_name,
            'price' => $request->product_price,
            'description' => $request->product_desc,
        ]);
        return redirect('home');
    }

    public function delete(Request $request){
        Product::where('id', $request->route('id'))->delete();
        return redirect('home');
    }

    public function index(Request $request){
        $search_query = $request->query('q');
        $products = Product::where('name', "LIKE" , "%$search_query%")->paginate(2)->appends(['q'=> $search_query]);
        $currUser = User::where('id', auth()->user()->id)->first();
        return view('home')->with('products', $products)->with('currUser', $currUser);
    }
}
