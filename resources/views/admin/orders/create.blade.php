@extends('adminlte::page')

@section('title', 'Add Product')
@section('plugins.Select2', true)
@section('content')

    <x-alert/>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Create New Order</h3>
            <div class="card-tools">
                <a href="{{route('admin.orders.index')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>Go Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.orders.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="user_id">Customer</label>
                    <select name="user_id" name="user_id" id="user_id"
                           class="form-control @error('user_id') is-invalid @endif">
                           @forelse ($users->where('role','0') as $user)
                           <option value="{{$user->id}}">{{$user->name}}</option>
                           @empty
                           <option>No Users Added!</option>
                           @endforelse


                    </select>
                    @error('user')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="product_id">Products</label>
                    <select name="product_id" name="product_id" id="product_id"
                           class="form-control @error('products') is-invalid @endif">
                           @forelse ($products as $product)
                           <option value="{{$product->id}}">{{$product->name}}</option>
                           @empty
                           <option>No Products Added!</option>
                           @endforelse


                    </select>
                    @error('user')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>


                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price"
                           class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? "" }}">
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-list-alt fa-fw mr-1"></i> Create New Product
                </button>
            </form>
@stop