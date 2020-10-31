<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Services\CartList;
use Illuminate\Http\Request;

class AddCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $arrayProductKey = [$request->product_id, $request->product_attrs];

        if (session('carts')) {
            $carts = session('carts');
        } else {
            $carts = new CartList;
        }

        if ($carts->checkHasNode($arrayProductKey)) {
            $carts->addTheSameNode($arrayProductKey, $request->product_amount);
        } else {
            $carts->addNewNode($request->all());
        }
        session()->put('carts', $carts);

        return response()->json(['code' => 200, 'carts' => $carts], 200);
    }
}
