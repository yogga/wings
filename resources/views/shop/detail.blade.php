@extends('layout.user.index')
@section('content')
<!-- Shop Start -->
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-3 pb-5">
            <img class="w-100 h-100" src="{{asset('img/Wings_logo.png')}}" alt="Image">
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$product->product_name}}</h3>
            <div class="d-flex">
                @if($product->discount>0)
                <h3 class="font-weight-semi-bold mb-4">{{currencyIDR($product->price - ($product->price *
                    $product->discount/100))}}</h3>
                <h6 class="text-muted ml-2"><del>{{currencyIDR($product->price)}}</del></h6>
                @else
                <h6>{{currencyIDR($product->price)}}</h6>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-2">Dimension</div>
                <div class="col-lg-4">: {{$product->dimension}}</div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-2">Price Unit</div>
                <div class="col-lg-4">: {{$product->unit}}</div>
            </div>
            <div class="alert alert-success" role="alert" style="display: none;">
                Berhasil ditambahkan ke dalam Keranjang!
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" id="qty" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary px-3 add-to-cart" data-sku="{{$product->product_code}}"><i
                        class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </div>
        </div>
    </div>

</div>
<!-- Shop Detail End -->
<!-- Shop End -->
@endsection
