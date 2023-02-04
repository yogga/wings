@extends('layout.user.index')
@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($cartItems as $c)
                    <tr data-sku="{{$c->id}}">
                        <td class="align-middle">
                            {{$c->name}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="qty-val form-control form-control-sm bg-secondary text-center"
                                    data-sku="{{$c->id}}" value="{{$c->quantity}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle" data-sku="{{$c->id}}">{{currencyIDR($c->price * $c->quantity)}}</td>
                        <td class="align-middle"><button class="btn btn-sm btn-primary btn-remove"
                                data-sku="{{$c->id}}"><i class="fa fa-times"></i></button></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold total">{{currencyIDR($total)}}</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3" id="confirm-order">Confirm Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection