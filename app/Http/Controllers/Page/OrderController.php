<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $carts = session('carts');
        $info_bill = [
            'user_id' => auth()->user()->id,
            'provider_id' => 1,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'delivery' => 0,
            'total_bill' => $carts->total,
        ];
        $carts_list = $carts->list;
        Bill::createBill($info_bill, $carts_list);
        session()->forget('carts');

        return redirect()->route('home')->with('order_status', 'Success');
    }
}
