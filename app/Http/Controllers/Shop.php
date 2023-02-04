<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Shop extends Controller
{

    public function index()
    {
        $this->data['title']        = "Shop";
        $this->data['products']     = Product::all();
        $this->data['script']       = "shop.script.index";
        return view('shop.index', $this->data);
    }

    public function detail($product_code)
    {
        $product = Product::where('product_code', $product_code)->firstOrFail();

        $this->data['title']        = $product->product_name;
        $this->data['product']      = $product;

        $this->data['script']       = "shop.script.detail";

        return view('shop.detail', $this->data);
    }
}
