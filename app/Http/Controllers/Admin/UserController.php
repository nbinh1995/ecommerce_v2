<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.users.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCustomer()
    {
        $customers = User::with('bills')->orderBy('updated_at', 'DESC')->get();
        $html = view('partials.table-tbody.table-customer', compact('customers'))->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listBanned()
    {
        $banneds = User::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        $html = view('partials.table-tbody.table-banned', compact('banneds'))->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $url = route('dashboard.users.store');
        $html = view('partials.form.form-user', ['url' => $url, 'idForm' => 'form-create'])->render();

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
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
        ];
        User::create($user);

        return response()->json(['code' => 201], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userID)
    {
        $bills = Bill::getBillsByUserId($userID);

        return view('admins.bills.bills', ['bills' => $bills]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $userID)
    {
        $url = route('dashboard.users.update', ['userID' => $userID->id]);
        $html = view('partials.form.form-user', ['url' => $url, 'idForm' => 'form-edit', 'user' => $userID])->render();

        return response()->json(['html' => $html], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $userID)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ];
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }

        $userID->update($user);

        return response()->json(['code' => 204], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($userID)
    {
        User::onlyTrashed()->findOrFail($userID)->restore();

        return response()->json(['code' => 204], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $userID)
    {
        $userID->delete();

        return response()->json(['code' => 204], 200);
    }
}
