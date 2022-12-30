@extends('layouts.admin')
@section('title') Orders @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="text-center">New Orders
                            <a href="{{url('order-history')}}" class="btn btn-secondary btn-sm float-right"> <i class="fa fa-rectangle-history"></i> Orders History</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center table-hover">
                            <thead>
                            <tr>
                                <th>Tracking ID</th>
                                <th>Total Price</th>
                                <th>Order Status</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($orders) > 0)
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order['tracking_no']}}</td>
                                        <td style="color: green">{{numberFormat($order['total_price'])}}</td>
                                        <td>
                                            @if($order['status'] == '0')
                                                <span style="color: coral;"><b>Pending</b></span>
                                            @elseif($order['status'] == '1')
                                                <span style="color: green;"><b>Completed</b></span>
                                            @endif
                                        </td>
                                        <td>{{$order['created_at']->format('F jS , Y - h:i:s A')}}</td>
                                        <td>
                                            <a href="{{url('admin/view-order/'.$order['id'])}}" data-toggle="tooltip" data-placement="top" title="View Order"><i class="fa fa-eye" style="color:#23527C"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-dim font-italic">No new order</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
