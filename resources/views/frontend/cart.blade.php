@extends('layouts.front')
@section('title') My Cart @endsection
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('/')}}">Home</a> / <a href="{{url('cart')}}">Cart</a></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->

    <div class="container">
        <div class="card shadow">
            <div class="card-body mt-4">
                @if(count($cartItems) > 0)
                    @php $total = 0 @endphp
                    @foreach($cartItems as $item)
                        <div class="row product_data mb-3">
                            <div class="col-md-2 my-auto">
                                <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" height="70px" width="70px" alt="image here">
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{$item->products->name}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>Rs. {{$item->products->selling_price}}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                @if($item->products->qty > $item->prod_qty)
                                    <label>Quantity</label>
                                    <div class="input-group text-center mb-3" style="width:130px;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    @php $total+= $item->products->selling_price * $item->prod_qty @endphp
                                @else
                                    <h6 class="required">Out of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item">Remove <i class="fa fa-trash-can"></i></button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center" style="color: #696969"><i>Cart is Empty</i></p>
                @endif
            </div>
            @if(count($cartItems) > 0)
                <div class="card-footer">
                    <h4 class="text-center ">Total Bill : <b>Rs.{{$total ?? 0}}/-</b></h4>
                    <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                </div>
            @endif
        </div>
    </div>
@endsection
