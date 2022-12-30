{{--{{dd($orders)}}--}}
@extends('layouts.admin')
@section('title') My Orders @endsection
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="text-center">
                            <a href="{{url('orders')}}" class="btn btn-secondary btn-sm float-left">Back</a>
                            View Order - {{$orders['tracking_no']}}
                        </h3>
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
                                            <td>{{numberFormat($item->price)}}</td>
                                            <td>
                                                <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="image here">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="4"><h5 class="text-center">Total Payable Bill: <span style="color: green">{{numberFormat($orders->total_price)}}</span></h5></td>
                                    </tr>
                                </table>
                                <div class="mt-3">
                                    <h4>Order Status <span class="required">*</span></h4>
                                    <form action="{{url('update-order/'.$orders['id'])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="status">
                                            <option value="">Select</option>
                                            <option {{ $orders['status'] == '0' ? 'selected' : '' }} value="0">Pending</option>
                                            <option {{ $orders['status'] == '1' ? 'selected' : '' }} value="1">Completed</option>
                                        </select>
                                        <input type="hidden" name="customer_gmail" value="{{$orders['email']}}">
                                        @error('order_status')
                                            <small class="error-val">{{ $message }}</small>
                                        @enderror
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary float-end btn-sm">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
