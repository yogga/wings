<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $this->data['title']    = "Keranjang";

        $this->data['cartItems'] = Cart::session(Auth::user()->id)->getContent();
        $this->data['total'] = Cart::session(Auth::user()->id)->getTotal();


        $this->data['script'] = 'cart.script.index';

        return view('cart.index', $this->data);
    }
    public function add_to_cart(Request $request)
    {
        $product = Product::where('product_code', $request->sku)->firstOrFail();

        $price = $product->price;
        if ($product->discount != 0)
            $price = $product->price - $product->price * $product->discount / 100;


        Cart::session(Auth::user()->id)->add(array(
            'id'        => $product->product_code,
            'name'      => $product->product_name,
            'price'     => $price,
            'quantity'  => $request->qty
        ));
    }


    public function update_cart(Request $request)
    {

        Cart::session(Auth::user()->id)->update($request->sku, [
            'quantity'  => [
                'relative' => false,
                'value' => $request->qty
            ]
        ]);

        $newTotal       = Cart::session(Auth::user()->id)->getTotal();
        $subTotal       = Cart::session(Auth::user()->id)->get($request->sku);
        return response()->json(
            [
                'message'   => "Berhasil",
                'data'      => [
                    'total'             => currencyIDR($newTotal),
                    'subtotal_product'  => currencyIDR($subTotal->price * $subTotal->quantity)
                ]
            ],
            200
        );
    }
    public function remove_cart(Request $request)
    {
        Cart::session(Auth::user()->id)->remove($request->sku);

        $newTotal       = Cart::session(Auth::user()->id)->getTotal();
        return response()->json(
            [
                'message'   => "Berhasil",
                'data'      => [
                    'total'             => currencyIDR($newTotal),
                ]
            ],
            200
        );
    }

    public function place_order(Request $request)
    {
        $carts = Cart::session(Auth::user()->id)->getContent();

        $transaction = TransactionHeader::create(
            [
                'user_id'           => Auth::user()->id,
                'document_code'     => 'TRX',
                'document_number'   => generateOrderNumber(),
                'total'             => Cart::session(Auth::user()->id)->getTotal()
            ]
        );

        foreach ($carts as $c) {
            $product = Product::where('product_code', $c->id)->firstOrFail();

            TransactionDetail::create([
                'document_code'         => $transaction->document_code,
                'document_number'       => $transaction->document_number,
                'product_code'          => $c->id,
                'price'                 => $c->price,
                'quantity'              => $c->quantity,
                'unit'                  => $product->unit,
                'subtotal'              => $c->price *  $c->quantity,
                'currency'              => "IDR",
            ]);
        }
        // Cart::session(Auth::user()->id)->clear();
        return response()->json(
            [
                'message'   => "Berhasil",
            ],
            200
        );
    }
}
