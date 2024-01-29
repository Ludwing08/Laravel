<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty())
        {
            return response()->json(['message' => 'No data'], 200);
        }else{
            return response()->json($products,200);
        }
        
    }
}
