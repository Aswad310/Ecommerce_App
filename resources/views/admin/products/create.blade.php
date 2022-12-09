@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3>Add Product
                            <a href="{{url('products')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="text-dim">In case you forget to create category can create by clicking this <i>Add Category button</i></label>
                                    <a href="{{url('add-category')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-pencil"></i> Add Category</a>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Category <span class="required">*</span></label>
                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                        <option value="">Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="e.g. Apple MacBook Pro"
                                           value="{{old('name')}}">
                                    @error('name')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Slug <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="slug"
                                           placeholder="e.g. apple mac book pro"
                                           value="{{old('slug')}}">
                                    @error('slug')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Small Description <span class="required">*</span></label>
                                    <textarea name="small_description"
                                              rows="3"
                                              class="form-control"
                                              placeholder="e.g. 2020 Apple MacBook Air Laptop: Apple M1 Chip, 13” Retina Display, 8GB RAM, 256GB SSD Storage"
                                    >{{old('small_description')}}</textarea>
                                    @error('small_description')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description <span class="required">*</span></label>
                                    <textarea name="description"
                                              id="editor"
                                              rows="10"
                                              class="form-control"
                                              placeholder="e.g. 2020 Apple MacBook Air Laptop: Apple M1 Chip, 13” Retina Display, 8GB RAM, 256GB SSD Storage, Backlit Keyboard, FaceTime HD Camera, Touch ID. Works with iPhone/iPad; Gold"
                                    >{{old('description')}}</textarea>
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
                                           value="{{old('original_price')}}">
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
                                           value="{{old('original_price')}}">
                                    @error('selling_price')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Tax</label>
                                    <input type="number"
                                           class="form-control"
                                           name="tax"
                                           placeholder="e.g. 20"
                                           value="{{old('tax')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Quantity <span class="required">*</span></label>
                                    <input type="number"
                                           class="form-control"
                                           name="qty"
                                           placeholder="e.g. 2"
                                           value="{{old('qty')}}">
                                    @error('qty')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox"
                                           name="status"
                                           value="1"
                                           @if(old('status') == '1') checked="checked" @endif>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox"
                                           name="trending"
                                           value="1"
                                           @if(old('trending') == '1') checked="checked" @endif>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Title <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="meta_title"
                                           placeholder="e.g. Apple MacBook Pro"
                                           value="{{old('meta_title')}}">
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
                                           value="{{old('meta_keywords')}}">
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
                                    >{{old('meta_description')}}</textarea>
                                    @error('meta_description')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Product Image</label>
                                    <input type="file"
                                           name="image"
                                           class="form-control"
                                           accept="image/*"
                                           value="{{old('image')}}">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
