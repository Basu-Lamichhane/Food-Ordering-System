@extends('adminlte::page')

@section('title', 'Add Category')

@section('content')
    
    <x-alert/>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Editing {{$product->name}} Product</h3>
            <div class="card-tools">
                <a href="{{route('admin.products.index')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>Go Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') ?? $product->name }}"
                    >

                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"
                           class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ?? $product->description }}">
                    @error('description')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price"
                           class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? $product->price }}">
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" name="category_id" id="category_id"
                           class="form-control @error('category') is-invalid @endif">
                           @forelse ($categories as $category)
                           <option value="{{$category->id}}" @if($category->id == $product->category->id) selected @endif>{{$category->name}}</option>
                           @empty
                           <option>No categories added yet</option>
                           @endforelse
                          
                           
                    </select>       
                    @error('category')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="onStock">Stock</label>
                    <select name="onStock" name="onStock" id="onStock"
                           class="form-control @error('onStock') is-invalid @endif">
                           <option value="0" @if($product->onStock == 0) selected @endif>No</option>
                           <option value="1" @if($product->onStock == 1) selected @endif>Yes</option>
                           
                    </select>       
                    @error('onStock')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="isVeg">Vegeterian</label>
                    <select name="isVeg" name="isVeg" id="isVeg"
                           class="form-control @error('isVeg') is-invalid @endif">
                           <option value="0" @if($product->isVeg == 0) selected @endif>No</option>
                           <option value="1" @if($product->isVeg == 1) selected @endif>Yes</option>
                           
                    </select>       
                    @error('isVeg')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="isDrink">Drink</label>
                    <select name="isDrink" name="isDrink" id="isDrink"
                           class="form-control @error('isDrink') is-invalid @endif">
                           <option value="0" @if($product->isDrink == 0) selected @endif>No</option>
                           <option value="1" @if($product->isDrink == 1) selected @endif>Yes</option>
                           
                    </select>       
                    @error('isDrink')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="image">Replace Product Image</label>
                    <input type="file" accept="image/*" name="image" id="image"
                           class="form-control @error('image') is-invalid @enderror" value="{{ old('image') ?? "" }}">
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-list-alt fa-fw mr-1"></i> Edit Product
                </button>
            </form>
@stop