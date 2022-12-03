{{--{{dd($allCategories)}}--}}
@extends('layouts.front')
@section('title') Ecommerce - Categories @endsection
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('/')}}">Home</a> / <a href="{{url('category')}}">Categories</a></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h3 class="mb-4">All Categories</h3>
                        @foreach($allCategories as $category)
                            <div class="col-md-4 mb-3">
                                <div class="card ">
                                    <a href="{{url('view-category/'.$category['slug'])}}"><img class="card-img-top" src="{{asset('assets/uploads/category/'.$category['image'])}}" alt="product image"></a>
                                    <div class="card-body">
                                        <h6 class="card-title">{{$category['name']}}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




