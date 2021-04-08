@extends('layouts.base')
@section('title', 'All Category')
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
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('category.addcategoryproduct') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                            @if(Session::has('category_delete'))
                                <div class="alert alert-success" role="alert">{{Session::get('category_delete')}}</div>
                            @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Name</th>
                                <th width="55%">Description</th>
                                <th width="10%">Status</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/edit-category-product/{{ $category->id }}">Edit</a>
                                        <a class="btn btn-danger" href="/delete-category-product/{{$category->id}}" style="margin-left: 10px;">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


