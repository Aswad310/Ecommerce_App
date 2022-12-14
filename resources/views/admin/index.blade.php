{{--{{dd($category)}}--}}
{{--{{dd($product)}}--}}
{{--{{dd($totalOrder)}}--}}
{{--{{dd($user)}}--}}
{{--{{dd($pendingOrder)}}--}}
{{--{{dd($totalEarning)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Aswad Ali </h1>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Total Earnings</p>
                        <h3 class="card-title">{{numberFormat($totalEarning)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">Pending and Completed orders both earnings</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Total Categories</p>
                        <h3 class="card-title">{{ $category }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ url('categories') }}">Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Total Products</p>
                        <h3 class="card-title">{{ $product }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ url('products') }}">Products</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Total Orders</p>
                        <h3 class="card-title">{{ $totalOrder }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ url('orders') }}">Total Orders</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Total Users</p>
                        <h3 class="card-title">{{ $user }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ url('users') }}">Users</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Orders Pending</p>
                        <h3 class="card-title">{{$pendingOrder}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ url('orders') }}">Orders Pending</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Orders Completed</p>
                        <h3 class="card-title">{{$completeOrder}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ url('order-history') }}">Orders Completed</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
