<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public static function getByID(int $id): array
    {
        $product= DB::select('select * from products where id = ?', [$id]);

        return $product;
    }

    public static function getFiltrs()
    {
        $product = Db::select('SELECT DISTINCT filtr FROM products');

        return $product;
    }

}
