{{--{{dd($orders)}}--}}
@extends('layouts.front')
@section('title') My Orders @endsection
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 shadow-sm breadcrumb border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('/')}}">Home</a> / <a href="{{url('my-orders')}}">Order History</a> / <b><a href="{{url('view-order/'.$orders['id'])}}">View Orders</a></b></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">View Order # {{$orders['tracking_no']}}</h3>
                    </div>
                    <div class="card-body text-dim">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <label>First Name</label>
                                <div class="border">{{$orders['fname']}}</div>
                                <label>Last Name</label>
                                <div class="border">{{$orders['lname']}}</div>
                                <label>Email</label>
                                <div class="border">{{$orders['email']}}</div>
                                <label>Contact No.</label>
                                <div class="border">{{$orders['phone']}}</div>
                                <label>Shipping Address</label>
                                <div class="border">
                                    {{$orders['address1']}},
                                    {{$orders['address2']}},
                                    {{$orders['city']}},
                                    {{$orders['state']}},
                                    {{$orders['country']}},
                                </div>
                                <label>Zip Code</label>
                                <div class="border p-2">{{$orders['pincode']}}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <table class="table table-bordered text-center table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderItems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>Rs.{{$item->price}}</td>
                                            <td>
                                                <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="image here">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="4"><h5 class="text-center">Total Payable Bill: <span style="color: green">Rs.{{$orders->total_price}}</span></h5></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
