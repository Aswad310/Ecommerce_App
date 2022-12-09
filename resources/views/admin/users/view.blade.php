{{--{{dd($user)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="text-center">
                            <a href="{{url('users')}}" class="btn btn-secondary btn-sm float-left">Back</a>
                            User Details
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Role</label>
                                <div class="p-2 border">{{$user['role_as'] == '0' ? 'User' : 'Admin'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>First Name</label>
                                <div class="p-2 border">{{$user['name'] ? $user['name'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Last Name</label>
                                <div class="p-2 border">{{$user['lname'] ? $user['lname'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                                <div class="p-2 border">{{$user['email'] ? $user['email'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Phone</label>
                                <div class="p-2 border">{{$user['phone'] ? $user['phone'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Address 1</label>
                                <div class="p-2 border">{{$user['address1'] ? $user['address1'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Address 2</label>
                                <div class="p-2 border">{{$user['address2'] ? $user['address2'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>City</label>
                                <div class="p-2 border">{{$user['city'] ? $user['city'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>State</label>
                                <div class="p-2 border">{{$user['state'] ? $user['state'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Country</label>
                                <div class="p-2 border">{{$user['country'] ? $user['country'] : 'Not Available'}}</div>
                            </div>
                            <div class="col-md-4">
                                <label>Pin Code</label>
                                <div class="p-2 border">{{$user['pincode'] ? $user['pincode'] : 'Not Available'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
