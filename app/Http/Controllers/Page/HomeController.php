<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = Product::orderBy('created_at', 'DESC')->take(6)->get();
        return view('pages.home', compact('products'));
    }
}
