{{--{{dd($products)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Products</h3>
                        <p class="card-category">All products present in our shop</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="mb-3">
                                <a href="{{url('add-product')}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Add Product</a>
                            </div>
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product['id']}}</td>
                                        <td>@if($product->category){{$product->category->name}}@else<span style='color: red'>{{'Category Deleted'}}</span>@endif</td>
                                        <td>{{$product['name']}}</td>
                                        <td>{{numberFormat($product['selling_price'])}}</td>
                                        <td>
                                            @if($product['status'] == '1')
                                                <span style="color: green">Active</span>
                                            @else
                                                <span style="color: red">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product['image'])
                                                <img src="{{ asset('assets/uploads/product/'.$product['image']) }}" alt="image here" width="50px">
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('delete-product/'.$product['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ url('edit-product/'.$product['id']) }}"><i class="fa fa-pencil" style="color: #23527C"></i></a>
                                                <span class="ml-2"></span>
                                                <button class="btnNoBackground"><i class="fa fa-trash-can" style="color: #ED5565"></i></button>
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
            </div>
        </div>
    </div>
@endsection
