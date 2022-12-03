{{--{{dd($categories)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header card-header-primary">
            <h3 class="card-title">Categories</h3>
            <p class="card-category">All categories present in our shop</p>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{url('add-category')}}" class="btn btn-primary">Add Category</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
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
                            <td>{{ Str::limit($category['description'], 20)}}</td>
                            <td>
                                @if($category['image'])
                                <img src="{{ asset('assets/uploads/category/'.$category['image']) }}" alt="image here" width="100px">
                                @else
                                <p>No Image</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$category['id']) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ url('delete-category/'.$category['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
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
@endsection
