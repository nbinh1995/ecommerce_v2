<?php

namespace App\Http\Controllers\Page;

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
    public function __invoke(Category $categorySlug, Product $productSlug)
    {
        $product = $productSlug;
        $attrs_values = $productSlug->getFullAttrNameValue();

        $products = Product::orderBy('created_at', 'DESC')->take(6)->get();
        return view('pages.shopdetail', compact('product', 'products', 'attrs_values'));
    }
}
