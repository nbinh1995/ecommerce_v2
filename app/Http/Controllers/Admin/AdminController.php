<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $admins = Admin::all();
        $html = view('partials.table-tbody.table-admin', compact('admins'))->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $url = route('dashboard.admins.store');
        $html = view('partials.form.form-admin', ['url' => $url, 'idForm' => 'form-create-admin'])->render();

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
        $admin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        Admin::create($admin);

        return response()->json(['code' => 201], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $adminID)
    {
        $url = route('dashboard.admins.update', ['adminID' => $adminID->id]);
        $html = view('partials.form.form-admin', ['url' => $url, 'idForm' => 'form-edit-admin', 'admin' => $adminID])->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $adminID)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }

        $adminID->update($user);

        return response()->json(['code' => 204], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $adminID)
    {
        $adminID->delete();

        return response()->json(['code' => 204], 200);
    }
}
