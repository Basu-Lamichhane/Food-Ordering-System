@extends('adminlte::page')

@section('title', 'Add Slider')

@section('content')

    <x-alert/>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Create New Slider</h3>
            <div class="card-tools">
                <a href="{{route('admin.sliders.index')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>Go Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Title</label>
                    <input
                        type="text"
                        name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') ?? "" }}"
                    >

                    @error('title')
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
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" name="url" id="url"
                           class="form-control @error('url') is-invalid @enderror" value="{{ old('url') ?? "" }}">
                    @error('url')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="active">Active</label>
                    <select name="active" id="active"
                           class="form-control @error('active') is-invalid @endif">
                           <option value="1">Yes</option>
                           <option value="0">No</option>


                    </select>
                    @error('active')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="image">Upload Slider Image</label>
                    <input type="file" accept="image/*" name="image" id="image"
                           class="form-control @error('image') is-invalid @enderror" value="{{ old('image') ?? "" }}">
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-image fa-fw mr-1"></i> Create New Slider
                </button>
@stop