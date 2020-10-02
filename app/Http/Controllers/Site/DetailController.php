<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Category $category, Product $product)
    {
        $products = Product::orderBy('created_at', 'DESC')->take(6)->get();
        return view('sites.shopdetail', compact('product', 'products'));
    }
}
