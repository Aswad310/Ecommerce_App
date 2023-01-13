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
                            <h5 class="mb-3 text-dim">Basic Details <small id="fieldError"></small></h5>
                            <div class="row text-dim">
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">First Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control firstname"
                                           name="fname"
                                           placeholder="e.g. Aswad"
                                           required
                                           value="{{Auth::user()->name}}">
                                    @error('fname')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lastname">Last Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control lastname"
                                           name="lname"
                                           placeholder="e.g. Ali"
                                           required
                                           value="{{Auth::user()->lname}}">
                                    @error('lname')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email"
                                           class="form-control email"
                                           name="email"
                                           required
                                           placeholder="e.g. aswad@gmail.com"
                                           value="{{Auth::user()->email}}">
                                    @error('email')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone-number">Phone Number <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control phone"
                                           name="phone"
                                           required
                                           placeholder="e.g. 03025390923"
                                           value="{{Auth::user()->phone}}">
                                    @error('phone')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address1">Address 1 <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control address1"
                                           name="address1"
                                           required
                                           placeholder="e.g. Street # 8 House # 30"
                                           value="{{Auth::user()->address1}}">
                                    @error('address1')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address2">Address 2</label>
                                    <input type="text"
                                           class="form-control address2"
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
                                           class="form-control city"
                                           name="city"
                                           required
                                           placeholder="e.g. Lahore"
                                           value="{{Auth::user()->city}}">
                                    @error('city')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">State <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control state"
                                           name="state"
                                           required
                                           placeholder="e.g. Punjab"
                                           value="{{Auth::user()->state}}">
                                    @error('state')
                                        <small class="error-val">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select class="form-select country" name="country" aria-label="Default select example">
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
                                           class="form-control pincode"
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
                                                <td>{{ $cartItem->products->name }}</td>
                                                <td>x{{ $cartItem->prod_qty }}</td>
                                                <td>{{ numberFormat($cartItem->products->selling_price) }}</td>
                                                <td style="color: green">{{ numberFormat($cartItem->prod_qty * $cartItem->products->selling_price) }}</td>
                                            </tr>
                                        @php $total+= $cartItem->prod_qty * $cartItem->products->selling_price @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="fs-4">
                                            <td style="text-align:right;" colspan="3">Total Bill</td>
                                            <td>{{ numberFormat($total ?? 0) }}</td>
                                            <input type="hidden" name="total_price" value="{{$total}}">
                                        </tr>
                                    </tfoot>
                                </table>
{{--                            <button class="btn btn-primary btn-sm w-100">Place Order</button>--}}
                                <input id="btnCountinue" class="btn btn-primary btn-sm w-100" onclick="validation()" value="Continue">
{{--                            <a href="/checkout-validation" id="btnCountinue" class="btn btn-success btn-block" type="submit" value="Continue">Continue</a>--}}
{{--                            <div class="paypal-button-container"></div>--}}
                                <div class="box-element hidden" id="btnPaypal">
                                    <small>Paypal Options</small>
                                    <div class="paypal-button-container"></div>
                                </div>
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

@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AVe2SahjvPGDqNnlM9hjLPyNNQ6WfIrU4hL9W9-kTOto4SGo_YEov0zznP_2hGZyvdkst0Gv3LE52PnI"></script>

    <script>
        function validation(){
            var firstname = $('.firstname').val();
            var lastname = $('.lastname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var country = $('.country').val();
            var pincode = $('.pincode').val();

            if(firstname == "" || lastname == "" || email == "" || phone == "" || address1 == "" || city=="" || state=="" || country=="" || pincode==""){
                alert("Fields can't be Empty")
            }
            else{
                $('#btnCountinue').addClass('hidden');
                $('#btnPaypal').removeClass('hidden');
            }
        }
    </script>

    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$total ?? 0}}' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];

                    var firstname = $('.firstname').val();
                    var lastname = $('.lastname').val();
                    var email = $('.email').val();
                    var phone = $('.phone').val();
                    var address1 = $('.address1').val();
                    var address2 = $('.address2').val();
                    var city = $('.city').val();
                    var state = $('.state').val();
                    var country = $('.country').val();
                    var pincode = $('.pincode').val();

                    // csrf token
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'fname':firstname,
                            'lname':lastname,
                            'email':email,
                            'phone':phone,
                            'address1':address1,
                            'address2':address2,
                            'city':city,
                            'state':state,
                            'country':country,
                            'pincode':pincode,
                            'total_price':{{$total ?? 0}}
                        },
                        success: function (response){
                            Swal.fire({
                                icon: 'success',
                                text: response.status,
                            });
                            window.location = "/thanks";
                        }
                    });
                });
            }
        }).render('.paypal-button-container');

    </script>
@endsection
