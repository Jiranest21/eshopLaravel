<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */


    public function filter(Request $request)
    {

        $arr = $request->all();
        $query = '1=2';
        $haystack = Product::getFiltrs();
        foreach ($arr as $key => $val) {
            for ($i = 0; $i < count($haystack); $i++) {
                if (!strcmp($val, $haystack[$i]->filtr)) {
                    $query .= " or filtr = '$val'";
                }
            }
        }
        $Product = DB::table("products")
            ->select("*")
            ->whereRaw($query)
            ->get();

        return view("welcome", [
            "products" => $Product,
            "filtrs" => Product::getFiltrs(),
        ]);
    }
    public function index()
    {
        return view('welcome', [
            "products" => Product::All(),
            "filtrs" => Product::getFiltrs(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        validator(request()->all(), [
            "name" => ["required"],
            "description" => ["required"],
            "price" => ["required", "decimal:2"],
            "filtr" =>["required","alpha:ascii"],
            

        ])->validate();

        $price = $request->input("price");
        $name = $request->input("name");
        $description = $request->input("description");
        $filtr = $request->input("filtr");

        DB::table("products")->insert([
            "price" => $price, "name"=>$name, "description"=>$description, "filtr"=> $filtr
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        validator(request()->all(), [
            "name" => ["required"],
            "description" => ["required"],
            "price" => ["required", "decimal:2"],
            "id" => ["numeric"]
        ])->validate();

        $name = $request->input("name");
        $description = $request->input("description");
        $price = $request->input("price");
        $id = $request->input("id");

        Db::table("products")
            ->where("id", $id)
            ->update(["name" => $name, "description" => $description, "price" => $price]);

        return redirect(route("Admin"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, Product $product)
    {
        $id = $request->input("id");
        DB::table("products")
            ->where("id", $id)
            ->delete($id);
        return redirect()->back();
    }
}
