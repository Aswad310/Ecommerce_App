{{--{{dd($popularCategories)}}--}}
@extends('layouts.front')
@section('title') Welcome to Ecommerce @endsection
<!--Mini Navbar section starts-->
    <div class="topnav navlink" id="myTopnav">
        <a class="active" style="text-decoration: none; color: #F16F3B"><b>Trending</b></a>
        @foreach($trendingProducts as $trendingProduct)
            <a href="{{'/category/'.$trendingProduct->category->slug.'/'.$trendingProduct->slug}}">{{$trendingProduct['name']}}</a>
        @endforeach
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
<!--Mini Navbar section ends-->
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
                                <a href="{{url('view-category/'.$popular['slug'])}}"><img class="card-img-top" src="{{asset('assets/uploads/category/'.$popular['image'])}}" alt="product image"></a>
                                <div class="card-body">
                                    <h6 class="card-title">{{$popular['name']}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

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
