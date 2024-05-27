<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cart extends Model
{
    use HasFactory;



    public static function getUsersItems(){
        $userid = auth()->user()->id;
        return DB::table('carts')
                    ->join('products', 'products.id', '=', 'carts.product_id')
                    ->where('carts.user_id','=',$userid)
                    ->select('products.name')
                    ->get();
    }
}
