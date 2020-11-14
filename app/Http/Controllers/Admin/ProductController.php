<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category:id,name')->orderBy('created_at', 'DESC')->get();

        return view('admins.products.list', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listImage(Product $productSlug)
    {
        $product_images = $productSlug->getProductAllImages();

        $html = view('partials.table-tbody.table-product_image', compact('product_images'))->render();

        return response()->json(['html' => $html], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::createProduct($request);

        return redirect()->route('dashboard.products')->with('create_status', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createImage(Request $request, $productID)
    {
        if ($request->product_images) {
            $images_path = explode(',', $request->product_images);
            foreach ($images_path as $image_path) {
                ProductImage::create(['product_id' => $productID, 'path' => "$image_path"]);
            }
        }

        return response()->json(['code' => 201], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $productSlug)
    {
        $product = $productSlug;
        $categoryAttrs = $product->category->getFullCategoryAttrs();
        $product_attrs_values = $product->getFullAttrNameValue();

        return view('admins.products.edit', compact('product', 'categoryAttrs', 'product_attrs_values'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $productSlug)
    {

        $productSlug->updateProduct($request);

        return redirect()->route('dashboard.products')->with('update_status', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $productSlug)
    {
        $productSlug->delete();

        return redirect()->route('dashboard.products')->with('remove_status', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function removeImage(ProductImage $productImageID)
    {
        $productImageID->delete();

        return response()->json(['code' => 204], 200);
    }
}
