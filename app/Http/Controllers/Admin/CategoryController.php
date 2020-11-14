<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryAttr;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\queue;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admins.categories.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::all();
        $html = view('partials.table-tbody.table-category', compact('categories'))->render();
        return response()->json(['html' => $html], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('dashboard.categories.store');
        $html = view('partials.form.form-category', ['url' => $url, 'idForm' => 'form-create'])->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAttrValuesForm(Request $request, $categoryID)
    {
        $categoryAttrs = Category::find($categoryID)->getFullCategoryAttrs();
        $product_attrs_values = [];
        if ($request->productID) {
            $product_attrs_values = Product::find($request->productID)->getFullAttrNameValue();
        }
        $html = view('partials.form.form-attribute_value', ['idForm' => 'form-create', 'categoryAttrs' => $categoryAttrs, 'product_attrs_values' => $product_attrs_values])->render();

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
        Category::createCategory($request->all());
        return response()->json(['code' => 201], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categorySlug)
    {
        $url = route('dashboard.categories.update', ['categorySlug' => $categorySlug->slug]);
        $attributes = $categorySlug->toStringCategoryAttrID();

        $html = view('partials.form.form-category', ['url' => $url, 'idForm' => 'form-edit', 'category' => $categorySlug, 'attrs_id_checked' => $attributes])->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categorySlug)
    {
        Category::updateCategory($request->all(), $categorySlug);

        return response()->json(['code' => 204], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorySlug)
    {
        Category::deleteCategory($categorySlug);

        return response()->json(['code' => 204], 200);
    }
}
