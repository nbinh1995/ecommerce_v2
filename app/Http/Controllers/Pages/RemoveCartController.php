<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemoveCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $arrayProductKey = [$request->product_id, $request->product_size_id];
        $carts = session('carts');
        $carts->removeNode($arrayProductKey);
        if ($carts->count != 0) {
            session()->put('carts', $carts);
        } else {
            session()->flush('carts');
        }

        $html = view('partials.common.section-cart')->render();

        return response()->json(['code' => 200, 'carts' => $carts, 'html' => $html], 200);
    }
}
