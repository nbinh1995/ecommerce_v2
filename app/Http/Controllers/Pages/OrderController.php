<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
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
        $info_bill = [
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'delivery' => 0,
            'total_bill' => session('carts')->total,
        ];
        $bill = Bill::create($info_bill);

        foreach (session('carts')->list as $cart) {
            $info_bill_detail = [
                'bill_id' => $bill->id,
                'product_id' => $cart->product_id,
                'price' => $cart->product_price,
                'amount' => $cart->product_amount,
                'size_id' => $cart->product_size_id,
                'total_detail' => $cart->product_total,
            ];
            BillDetail::create($info_bill_detail);
        }
        return redirect()->route('home')->with('order_status', 'Success');
    }
}
