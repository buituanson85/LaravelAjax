@extends('layouts.base')
@section('title', 'Edit Category')
@section('content')
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6" style="font-size: 16px;font-weight: bold;">
                                Edit Category
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('category.allcategoryproduct') }}" class="btn btn-success pull-right">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('category_update'))
                            <div class="alert alert-success" role="alert">{{ Session::get('category_update') }}</div>
                        @endif
                        <form class="form-horizontal" action="{{ route('category.updatecategoryproduct') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" value="{{ $category->name }}" placeholder="Category Name" id="name" name="name" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description" id="description" name="description">{{ $category->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Status</label>
                                <div class="col-md-2">
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Select Option</option>
                                        @if( $category->status === 'instock')
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
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

