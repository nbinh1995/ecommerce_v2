<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        $product = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'category_id' => $request->category_id,
            'is_new' => $request->is_new,
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = new UploadFile($request->image);
            $product['image'] = $file->uploadFile();
        }

        if ($request->description) {
            $product['description'] = $request->description;
        }

        Product::create($product);

        return redirect()->route('dashboard.products')->with('create_status', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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

        return view('admins.products.edit', compact('$product'));
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
        $product = [
            'price' => $request->price,
            'category_id' => $request->category_id,
            'is_new' => $request->is_new,
        ];

        if ($request->name != $productSlug->name) {
            $product['name'] = $request->name;
            $product['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = new UploadFile($request->image);
            $file->removeFile($productSlug->image);
            $product['image'] = $file->uploadFile();
        }

        if ($request->description) {
            $product['description'] = $request->description;
        }

        $productSlug->update($product);

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
}
