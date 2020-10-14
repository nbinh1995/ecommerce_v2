<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.sizes.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $sizes = Size::all();
        $html = view('partials.table-tbody.table-size', compact('sizes'))->render();

        return response()->json(['html' => $html], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('dashboard.sizes.store');
        $html = view('partials.form.form-size', ['url' => $url, 'idForm' => 'form-create'])->render();

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
        Size::create($request->all());

        return response()->json(['code' => 201], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function show(Size $sizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $sizeID)
    {
        $url = route('dashboard.sizes.update', ['sizeID' => $sizeID->id]);
        $html = view('partials.form.form-size', ['url' => $url, 'idForm' => 'form-edit', 'size' => $sizeID])->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $sizeID)
    {
        $sizeID->update($request->all());

        return response()->json(['code' => 204], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $sizeID)
    {
        $sizeID->delete();

        return response()->json(['code' => 204], 200);
    }
}
