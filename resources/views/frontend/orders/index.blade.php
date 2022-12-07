{{--{{dd($orders)}}--}}
@extends('layouts.front')
@section('title') My Orders @endsection
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 breadcrumb shadow-sm border-top">
        <div class="container">
            <h6><a href="{{url('/')}}">Home</a> / <b><a href="{{url('my-orders')}}">Order History</a></b></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Order History - {{ Auth::user()->name }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center table-hover">
                            <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Order Status</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order['tracking_no']}}</td>
                                    <td style="color: green">Rs.{{$order['total_price']}}</td>
                                    <td>
                                        @if($order['status'] == '0')
                                            <span style="color: coral;"><b>Pending</b></span>
                                        @else
                                            <span style="color: green;"><b>Completed</b></span>
                                        @endif
                                    </td>
                                    <td>{{$order['created_at']->format('F jS , Y - h:i:s A')}}</td>
                                    <td>
                                        <a href="{{url('view-order/'.$order['id'])}}" class="btn btn-primary">view</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
