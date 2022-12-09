{{--{{dd($categories)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Categories</h3>
                        <p class="card-category">All categories present in our shop</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{url('add-category')}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Add Category</a>
                        </div>
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category['id']}}</td>
                                        <td>{{$category['name']}}</td>
                                        <td>{!! Str::limit($category['description'], 30)!!}</td>
                                        <td>
                                            @if($category['status'] == '1')
                                                <span style="color: green">Active</span>
                                            @else
                                                <span style="color: red">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($category['image'])
                                                <img src="{{ asset('assets/uploads/category/'.$category['image']) }}" alt="image here" width="75px">
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('delete-category/'.$category['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ url('edit-category/'.$category['id']) }}"><i class="fa fa-pencil" style="color:#23527C"></i></a>
                                                <span class="ml-2"></span>
                                                <button class="btnNoBackground"><i class="fa fa-trash-can" style="color:#ED5565"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                                <td colspan="6" class="p-4" style="text-align: center">No categories added.</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
