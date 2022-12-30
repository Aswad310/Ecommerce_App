{{--{{dd($product)}}--}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3>Update Product - {{ $product['name'] }}
                            <a href="{{url('products')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update-product/'.$product['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Category <small class="required">fixed</small></label>
                                    <select  class="form-select" name="category_id" aria-label="Default select example">
                                        <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                    </select>
                                    @error('category_id')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="e.g. Apple MacBook Pro"
                                           value="{{$product['name']}}">
                                    @error('name')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Small Description <span class="required">*</span></label>
                                    <textarea name="small_description"
                                              rows="3"
                                              class="form-control"
                                              placeholder="e.g. 2020 Apple MacBook Air Laptop: Apple M1 Chip, 13” Retina Display, 8GB RAM, 256GB SSD Storage"
                                    >{{$product['small_description']}}</textarea>
                                    @error('small_description')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description <span class="required">*</span></label>
                                    <textarea name="description"
                                              id="editor"
                                              rows="5"
                                              class="form-control"
                                              placeholder="e.g. 2020 Apple MacBook Air Laptop: Apple M1 Chip, 13” Retina Display, 8GB RAM, 256GB SSD Storage, Backlit Keyboard, FaceTime HD Camera, Touch ID. Works with iPhone/iPad; Gold"
                                    >{{$product['description']}}</textarea>
                                    @error('description')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Original Price <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control"
                                           name="original_price"
                                           placeholder="e.g. 1050.00"
                                           value="{{$product['original_price']}}">
                                    @error('original_price')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Selling Price <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control"
                                           name="selling_price"
                                           placeholder="e.g. 749"
                                           value="{{$product['selling_price']}}">
                                    @error('selling_price')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Quantity <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control"
                                           name="qty"
                                           placeholder="e.g. 2"
                                           value="{{$product['qty']}}">
                                    @error('qty')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="active">Active</label>
                                    <input type="checkbox"
                                           id="active"
                                           name="status"
                                           @if($product['status'] == '1') checked="checked" @endif>
                                    <small class="text-dim">(show the product)</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="trending">Trending</label>
                                    <input type="checkbox"
                                           id="trending"
                                           name="trending"
                                           @if($product['trending'] == '1') checked="checked" @endif>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Title <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="meta_title"
                                           placeholder="e.g. Apple MacBook Pro"
                                           value="{{$product['meta_title']}}">
                                    @error('meta_title')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Keyword <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="meta_keywords"
                                           placeholder="e.g. apple, macbook, laptop"
                                           value="{{$product['meta_keywords']}}">
                                    @error('meta_keywords')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta Description <span class="required">*</span></label>
                                    <textarea name="meta_description"
                                              rows="3"
                                              class="form-control"
                                              placeholder="apple mac book pro"
                                    >{{$product['meta_description']}}</textarea>
                                    @error('meta_description')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Product Image</label>
                                    <input type="file"
                                           name="image"
                                           class="form-control"
                                           accept="image/*">
                                </div>
                                <div class="col-md-6">
                                    @if($product['image'])
                                        <img src="{{ asset('assets/uploads/product/'.$product['image']) }}" alt="image here" width="150px">
                                    @else
                                        <p>No Image Available</p>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
