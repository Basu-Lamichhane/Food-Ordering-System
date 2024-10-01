@extends('adminlte::page')

@section('title', 'Add Category')

@section('content')
    
    <x-alert/>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Create New Category</h3>
            <div class="card-tools">
                <a href="{{route('admin.categories.index')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>Go Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') ?? "" }}"
                    >

                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"
                           class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ?? "" }}">
                    @error('description')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-list-alt fa-fw mr-1"></i> Create New Category
                </button>
@stop