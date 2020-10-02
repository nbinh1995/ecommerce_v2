<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $category = null)
    {
        if ($category) {
            switch ($category) {
                case 'new-arrivals':
                    $products = Product::orderBy('created_at', 'DESC')->paginate(9);
                    return view('sites.shop', compact('products'));
                    break;
                case 'men':
                    $products = Product::where('category_id', 2)->paginate(9);
                    return view('sites.shop', compact('products'));
                    break;
                case 'women':
                    $products = Product::where('category_id', 3)->paginate(9);
                    return view('sites.shop', compact('products'));
                    break;
                case 'children':
                    $products = Product::where('category_id', 4)->paginate(9);
                    return view('sites.shop', compact('products'));
                    break;
            }
        } else {
            $products = Product::paginate(9);
            return view('sites.shop', compact('products'));
        }
    }
}
