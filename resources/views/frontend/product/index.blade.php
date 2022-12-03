{{--{{dd($category)}}--}}
{{--{{dd($products)}}--}}
@extends('layouts.front')
@section('title', 'Ecommerce | '.$category['name'])
@section('content')
    <div class="py-3 shadow-sm bg-warning border-top">
        <div class="container">
            <h6><a href="{{url('/')}}">Home</a> / <a href="{{url('category')}}">Categories</a> / <a href="">{{$category['name']}}</a></h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="mb-4">{{$category['name']}}</h2>
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{url('category/'.$category['slug'].'/'.$product['slug'])}}"><img class="card-img-top" width=100px src="{{asset('assets/uploads/product/'.$product['image'])}}" alt="product image"></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$product['name']}}</h5>
                                    <span class="float-start">{{$product['selling_price']}}</span>
                                    <span class="float-end"><s>{{$product['original_price']}}</s></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="container">
                        <span style="text-align: center">No products found</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
