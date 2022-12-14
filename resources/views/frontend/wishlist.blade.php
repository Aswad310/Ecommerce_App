{{--{{dd($wishlist)}}--}}
@extends('layouts.front')
@section('title') My Cart @endsection
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 breadcrumb mb-4 shadow-sm border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('/')}}">Home</a> / <b><a href="{{url('wishlist')}}">Wishlist</a></b></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->

    <div class="container">
        <div class="card shadow wishlistItems">
            <div class="card-body">
                @if(count($wishlist) > 0)
                    <div class="card-body mt-4">
                            @foreach($wishlist as $item)
                                <div class="row product_data mb-3">
                                    <div class="col-md-2 my-auto">
                                        <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" height="70px" width="70px" alt="image here">
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>{{$item->products->name}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>{{numberFormat($item->products->selling_price)}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                        <input type="hidden" class="qty-input" value="1">
                                        @if($item->products->qty >=  $item->prod_qty)
                                            <h6>In Stock</h6>
                                        @else
                                            <h6>Out of Stock</h6>
                                        @endif
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        @if($item->products->qty > 0)
                                            <button class="btn btn-success btn-sm addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        @else
                                            <p class="text-dim"><i>Come Back Soon</i></p>
                                        @endif
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <button class="btn btn-danger btn-sm remove-wishlist-item"><i class="fa fa-trash-can"></i> Remove</button>
                                    </div>
                                </div>
                            @endforeach
                @else
                    <p class="text-center" style="color: #696969"><i>There are no products in your wishlist</i></p>
                @endif
            </div>
        </div>
    </div>
@endsection
