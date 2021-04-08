@extends('layouts.base')
@section('title', 'All Product')
@section('content')
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6" style="font-size: 16px;font-weight: bold;">
                            All Products
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('product.addproduct') }}" class="btn btn-success pull-right">Add New Product</a>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    @if(Session::has('product_delete'))
                        <div class="alert alert-success" role="alert">{{Session::get('product_delete')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('assets/uploads/products') }}/{{ $product->image }}" width="60" alt=""></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <a class="btn btn-success" href="/admin/edit-product/{{ $product->id }}">Edit</a>
                                    <a class="btn btn-danger" href="/admin/delete-product/{{ $product->id }}" style="margin-left: 10px;">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
