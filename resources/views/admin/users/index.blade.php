{{--{{dd($users)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Registered Users</h3>
                        <p class="card-category">Every information of the user you want to know</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user['id']}}</td>
                                        <td>{{$user['role_as'] == '0' ? 'User' : 'Admin'}}</td>
                                        <td>{{$user['name'].$user['lname']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>
                                            @if(!$user['phone']) <span style="color:#f85f5f"><i>Empty</i></span> @endif
                                            {{$user['phone']}}
                                        </td>
                                        <td>
                                            <a href="{{ url('view-user/'.$user['id']) }}" data-toggle="tooltip" data-placement="top" title="View User"><i class="fa fa-eye" style="color:#23527C"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="4" class="p-4" style="text-align: center">No user found.</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
