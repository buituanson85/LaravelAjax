@extends('layouts.base')
@section('title', 'Edit Product')
@section('content')
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6" style="font-size: 16px;font-weight: bold;">
                            Add New Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('product.allproduct') }}" class="btn btn-success pull-right">All Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('product_create'))
                        <div class="alert alert-success" role="alert">{{ Session::get('product_create') }}</div>
                    @endif
                    <form action="{{ route('product.updateproduct') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Product Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Short Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="short_description"  id="short_description" >{{ $product->short_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="description" name="description" >{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Regular Price</label>
                            <div class="col-md-4">
                                <input type="text" id="regular_price" value="{{ $product->regular_price }}" name="regular_price" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Sale Price</label>
                            <div class="col-md-4">
                                <input type="text" id="sale_price" value="{{ $product->sale_price }}" name="sale_price" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" id="SKU" value="{{ $product->SKU }}" name="SKU" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Stock</label>
                            <div class="col-md-4">
                                <select class="form-control" name="status" id="status">
                                    <option value="">===== Select Option =====</option>
                                    @if( $product->status === 'instock')
                                    <option selected value="instock">InStock</option>
                                    <option  value="ontofstock">Out of Stock</option>
                                    @else
                                    <option value="instock">InStock</option>
                                    <option selected value="ontofstock">Out of Stock</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Featured</label>
                            <div class="col-md-4">
                                <select class="form-control" name="featured" id="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                    <option value="">===== Select Option =====</option>
                                    @if( $product->featured === 0)
                                        <option selected value="0">No</option>
                                        <option value="1">Yes</option>
                                    @else
                                        <option value="0">No</option>
                                        <option selected value="1">Yes</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Quantity</label>
                            <div class="col-md-4">
                                <input type="text" value="{{ $product->quantity }}" id="quantity" name="quantity" class="form-control input-md" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-file" alt="abc">
                                <div class="image-preview" id="imagePreview">
                                    <img class="image-preview__image" width="150px" src="{{ asset('assets/uploads/products') }}/{{ $product->image }}" id="img_thumbnail" alt="">
                                    <span class="image-preview__default-text"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" >Category</label>
                            <div class="col-md-4">
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">===== Select Category =====</option>
                                    @foreach($categories as $category)
                                        <option
                                            @if($product->category_id === $category->id)
                                                selected
                                            @endif
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" ></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

