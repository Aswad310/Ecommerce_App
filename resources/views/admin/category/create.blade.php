@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3>Create Category
                            <a href="{{url('categories')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="e.g. Electronics"
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
                                           placeholder="e.g. electronics"
                                           value="{{old('slug')}}">
                                    @error('slug')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <!-- description section starts -->
                                <div class="col-md-12 mb-3">
                                    <label for="">Description <span class="required">*</span></label>
                                    <textarea name="description"
                                              id="editor"
                                              rows="5"
                                              class="form-control"
                                              placeholder="e.g. All kinds of electronics items"
                                    >{{old('description')}}</textarea>
                                    @error('description')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <!-- description section ends -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox"
                                           name="status"
                                           value="1"
                                           @if(old('status') == '1') checked="checked" @endif>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Popular</label>
                                    <input type="checkbox"
                                           name="popular"
                                           value="1"
                                           @if(old('popular') == '1') checked="checked" @endif>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Title <span class="required">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="meta_title"
                                           placeholder="e.g. Electronics"
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
                                           placeholder="e.g. good electronics, electronics"
                                           value="{{old('meta_keywords')}}">
                                    @error('meta_keywords')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta Description <span class="required">*</span></label>
                                    <textarea name="meta_descrip"
                                              rows="3"
                                              class="form-control"
                                              placeholder="electronics, electronic, all kinds of electronics items"
                                    >{{old('meta_descrip')}}</textarea>
                                    @error('meta_descrip')
                                    <strong class="error-val">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Category Image</label>
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
