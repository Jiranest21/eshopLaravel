<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

    

    public function index()
    {
        return view('order.cart',["products" =>Cart::getUsersItems()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        validator(request()->all(),[
            "product_id" => "numeric"
        ])->validate();
        $product_id = request()->input("product_id");
        Db::table("carts")->insert([
            ["user_id" => auth()->user()->id, "product_id" => $product_id]
            
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Db::table("carts")->where("user_id", "=", auth()->user()->id)->delete();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        validator($request->all(),[
            "id" => "numeric"
        ])->validate();

        $product = $request->input("id");
        DB::table("carts")->where("user_id", "=", auth()->user()->id)->where("product_id","=",$product)->delete();
        return redirect()->back();    
    }
}
