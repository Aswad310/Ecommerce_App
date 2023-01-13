{{--{{dd($category)}}--}}
{{--{{dd($products)}}--}}
@extends('layouts.front')
@section('title', 'Ecommerce | '.$category['name'])
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 breadcrumb shadow-sm border-top">
        <div class="container">
            <h6><a href="{{url('/')}}">Home</a> / <a href="{{url('category')}}">Categories</a> / <b><a href="">{{$category['name']}}</a></b></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->
    <div class="py-4">
        <div class="container">
            <div class="row ">
                <h2 class="mb-4">{{$category['name']}}</h2>
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{url('category/'.$category['slug'].'/'.$product['slug'])}}">
                                    @if($product['image'])
                                        <img class="card-img-top" width=100px src="{{asset('assets/uploads/product/'.$product['image'])}}" alt="product image">
                                    @else
                                        <img class="card-img-top" src="https://via.placeholder.com/360x263" alt="category image">
                                    @endif
                                </a>
                                <div class="card-body product_data">
                                    <h5 class="card-title">{{$product['name']}}</h5>
                                    <p>
                                        <span class="fs-4" style="color:green">{{ numberFormat($product['selling_price']) }}</span>
                                    </p>
                                    @if($product['qty'] > 0)
                                        <input type="hidden" class="prod_id" value="{{$product['id']}}">
                                        <input type="hidden" class="qty-input" value="1">
                                        <button type="button" title="Add to cart" class="btn btn-outline-primary btn-sm addToCartBtn float-end"><i class="fa fa-cart-shopping"></i> Add to Cart</button>
                                        @auth()
                                            <a href="{{url('checkout')}}" title="Buy Now" class="btn btn-outline btn-sm buyNowBtn float-start"><i class="fa fa-arrow-right-from-bracket"></i> Buy Now</a>
                                        @endauth
                                    @else
                                        <label class="badge bg-danger float-start">Out of Stock</label>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="container">
                        <div class="card py-4">
                            <span class="text-dim text-center"><i>Products not found</i></span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
