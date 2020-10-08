<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        Category::create($category);

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
        $html = view('partials.form.form-category', ['url' => $url, 'idForm' => 'form-edit', 'category' => $categorySlug])->render();

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
        $category = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        $categorySlug->update($category);

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
        $categorySlug->delete();

        return response()->json(['code' => 204], 200);
    }
}
