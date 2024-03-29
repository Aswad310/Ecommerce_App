@extends('layouts.front')
@section('title', 'Product | '.$product['name'])
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 breadcrumb shadow-sm border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('/')}}">Home</a> / <a href="{{url('category')}}">Categories</a> / <a href="{{url('view-category/'.$product->category->slug)}}">{{$product->category->name}}</a> / <b><a href="">{{$product->name}}</a></b> </h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->

    <div class="container mt-5">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        @if($product['image'])
                            <img src="{{asset('assets/uploads/product/'.$product['image'])}}" class="w-100" alt="image here">
                        @else
                            <img class="card-img-top" src="https://via.placeholder.com/360x263" alt="category image">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0 mt-3">
                            {{$product['name']}}
                            @if($product['trending'] == '1')
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr />
                        <label class="fw-bold">Price: {{numberFormat($product['selling_price'])}}</label>
                        <p class="mt-3">{{$product['small_description']}}</p>
                        <hr />
                        @if($product['qty'] > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$product['id']}}" class="prod_id">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center qty-input" name="quantity" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                @if($product['qty'] > 0)
                                    <button type="button" class="btn btn-primary me-3 btn-sm addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 btn-sm addToWishlist float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row p-5">
                    <h2>Description</h2>
                    <p class="mt-3">{!! $product['description'] !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
