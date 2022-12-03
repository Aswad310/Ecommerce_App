{{--{{dd($products)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header card-header-primary">
            <h3 class="card-title">Products</h3>
            <p class="card-category">All products present in our shop</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <div class="mb-3">
                    <a href="{{url('add-product')}}" class="btn btn-primary">Add Product</a>
                </div>
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product['id']}}</td>
                            <td>@if($product->category){{$product->category->name}}@else<span style='color: red'>{{'Category Deleted'}}</span>@endif</td>
                            <td>{{$product['name']}}</td>
                            <td>Rs.{{$product['selling_price']}}</td>
                            <td>
                                @if($product['image'])
                                <img src="{{ asset('assets/uploads/product/'.$product['image']) }}" alt="image here" width="100px">
                                @else
                                <p>No Image</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$product['id']) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ url('delete-product/'.$product['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="6" class="p-4" style="text-align: center">No products added.</td>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
