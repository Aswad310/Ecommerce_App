{{--{{dd($cartItems)}}--}}
{{--{{dd($getCountryList)}}--}}
@extends('layouts.front')
@section('title') Checkout @endsection
@section('content')
    <!-- Breadcrumbs section starts-->
    <div class="py-3 shadow-sm breadcrumb border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('/')}}">Home</a> / <a href="{{url('cart')}}">Cart</a> / <a href="{{url('checkout')}}">Checkout</a></h6>
        </div>
    </div>
    <!-- Breadcrumbs section ends-->
    <div class="container my-4">
        <form action="{{url('place-order')}}" method="POST">
            @csrf
            <div class="row">
                <!-- User Basic Details section starts-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-3 text-dim">Basic Details</h5>
                            <div class="row text-dim">
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">First Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="fname"
                                           placeholder="e.g. Aswad"
                                           value="{{Auth::user()->name}}">
                                    @error('fname')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lastname">Last Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="lname"
                                           placeholder="e.g. Ali"
                                           value="{{Auth::user()->lname}}">
                                    @error('lname')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           placeholder="e.g. aswad@gmail.com"
                                           value="{{Auth::user()->email}}">
                                    @error('email')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone-number">Phone Number <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control"
                                           name="phone"
                                           placeholder="e.g. 03025390923"
                                           value="{{Auth::user()->phone}}">
                                    @error('phone')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address1">Address# 1 <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="address1"
                                           placeholder="e.g. Street # 8 House # 30"
                                           value="{{Auth::user()->address1}}">
                                    @error('address1')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address2">Address# 2 <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="address2"
                                           placeholder="e.g. Near Gulberg 3"
                                           value="{{Auth::user()->address2}}">
                                    @error('address2')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city">City <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="city"
                                           placeholder="e.g. Lahore"
                                           value="{{Auth::user()->city}}">
                                    @error('city')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">State <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="state"
                                           placeholder="e.g. Punjab"
                                           value="{{Auth::user()->state}}">
                                    @error('state')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select class="form-select" name="country" aria-label="Default select example">
                                        <option value="">Select</option>
                                        @foreach ($getCountryList as $key => $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="pin-code">Pin Code <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control"
                                           name="pincode"
                                           placeholder="e.g. 54000"
                                           value="{{Auth::user()->pincode}}">
                                    @error('pincode')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Basic Details section ends-->

                <!-- Order Details section starts -->
                <div class="col-md-6">
                    <div class="card p-2">
                        <div class="card-body">
                            <h5 class="mb-4">Order Details</h5>
                            @if(count($cartItems) > 0)
                                <table class="table table-bordered text-center table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Product Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @foreach($cartItems as $cartItem)
                                            <tr>
                                                <td>{{$cartItem->products->name}}</td>
                                                <td>{{$cartItem->prod_qty}}</td>
                                                <td>Rs.{{$cartItem->products->selling_price}}</td>
                                                <td style="color: green"><b>Rs.{{$cartItem->prod_qty * $cartItem->products->selling_price}}</b></td>
                                            </tr>
                                        @php $total+= $cartItem->prod_qty * $cartItem->products->selling_price @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-dim" style="text-align:right;" colspan="3">Total Payable Bill</th>
                                            <td><b>Rs.{{$total ?? 0}}/-</b></td>
                                            <input type="hidden" name="total_price" value="{{$total}}">
                                        </tr>
                                    </tfoot>
                                </table>
                            <button class="btn btn-primary btn-sm w-100">Place Order</button>
                            @else
                                <p class="text-center text-dim"><i>No products in the cart</i></p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Order Details section ends -->
            </div>
        </form>
    </div>
@endsection
