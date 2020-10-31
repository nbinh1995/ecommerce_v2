<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.attributes.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $attrs = Attribute::all();
        $html = view('partials.table-tbody.table-attribute', compact('attrs'))->render();

        return response()->json(['html' => $html], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('dashboard.attributes.store');
        $html = view('partials.form.form-attribute', ['url' => $url, 'idForm' => 'form-create'])->render();

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
        Attribute::createAttribute($request->all());

        return response()->json(['code' => 201], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attrID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attrID)
    {
        $url = route('dashboard.attributes.update', ['attrID' => $attrID->id]);
        $html = view('partials.form.form-attribute', ['url' => $url, 'idForm' => 'form-edit', 'attr' => $attrID])->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attrID)
    {
        Attribute::updateAttribute($request->all(), $attrID);
        return response()->json(['code' => 204], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attrID)
    {
        Attribute::deleteAttribute($attrID);

        return response()->json(['code' => 204], 200);
    }
}
