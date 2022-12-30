{{--{{dd($popularCategories)}}--}}
@extends('layouts.front')
@section('title') Ecommerce @endsection
@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h3 class="mb-4">Popular Categories</h3>
                <div class="owl-carousel owl-theme">
                    @foreach($popularCategories as $popular)
                        <div class="item">
                            <div class="card">
                                <a href="{{url('view-category/'.$popular['slug'])}}">
                                    @if($popular['image'])
                                        <img class="card-img-top" src="{{asset('assets/uploads/category/'.$popular['image'])}}" alt="category image">
                                    @else
                                        <img class="card-img-top" src="https://via.placeholder.com/400x220" alt="category image">
                                    @endif
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title">{{$popular['name']}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--Dynamic-->
        <div class="container mt-4">
            @foreach($categories as $category)
                <h3 class="mb-4 onHoverUnderline"><a href="{{url('view-category/'.$category['slug'])}}" class="text-decoration-none text-black text-dm">{{ $category['name'] }}</a></h3>
                <div class="row">
                    @foreach($products as $product)
                        @if($category['id'] == $product['category_id'])
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
                                            <span style="color:green"><b>{{numberFormat($product['selling_price'])}}</b></span>
                                        </p>
                                        @if($product['qty'] > 0)
                                            <input type="hidden" class="prod_id" value="{{$product['id']}}">
                                            <input type="hidden" class="qty-input" value="1">
                                            <button type="button" title="Add to cart" class="btn btn-primary btn-sm addToCartBtn float-end"><i class="fa fa-cart-shopping"></i> Add to Cart</button>
                                            @auth()
                                                <a href="{{url('checkout')}}" title="Buy Now" class="btn btn-outline-success btn-sm buyNowBtn float-start"><i class="fa fa-arrow-right-from-bracket"></i> Buy Now</a>
                                            @endauth
                                        @else
                                            <label class="badge bg-danger float-start">Out of Stock</label>
                                        @endif
                                        <br>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection

<!-- Owl Carousel -->
@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
@endsection
