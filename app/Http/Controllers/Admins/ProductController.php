<?php

namespace App\Http\Controllers\Admins;

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
        return view('admins.products.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $products = Product::with('category:id,name')->orderBy('created_at', 'DESC')->get();
        $html = view('partials.table-tbody.table-product', compact('products'))->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('dashboard.products.store');
        $html = view('partials.form.form-product', ['url' => $url, 'idForm' => 'form-create'])->render();

        return response()->json(['html' => $html], 200);
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

        return response()->json(['code' => 201], 200);
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
        $url = route('dashboard.products.update', ['productSlug' => $productSlug->slug]);
        $html = view('partials.form.form-product', ['url' => $url, 'idForm' => 'form-edit', 'product' => $productSlug])->render();

        return response()->json(['html' => $html], 200);
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

        return response()->json(['code' => 204], 200);
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

        return response()->json(['code' => 204], 200);
    }
}
