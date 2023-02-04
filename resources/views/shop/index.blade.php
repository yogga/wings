@extends('layout.user.index')
@section('content')
<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="px-xl-5">
        <!-- Shop Product Start -->
        <div class="row pb-3">
            @foreach ($products as $p)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{asset('img/Wings_logo.png')}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$p->product_name}}</h6>
                        <div class="d-flex justify-content-center">
                            @if($p->discount>0)
                            <h6>{{currencyIDR($p->price - ($p->price * $p->discount/100))}}</h6>
                            <h6 class="text-muted ml-2"><del>{{currencyIDR($p->price)}}</del></h6>
                            @else
                            <h6>{{currencyIDR($p->price)}}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{url("shop/detail/$p->product_code")}}" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a>
                        <button class="btn btn-sm text-dark p-0 add-to-cart" data-sku="{{$p->product_code}}"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection
