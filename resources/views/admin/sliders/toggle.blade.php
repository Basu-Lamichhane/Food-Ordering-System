@extends('adminlte::page')

@section('title', 'Toggle Sliders')

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Sliders</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{route('admin.sliders.create')}}"><i class="fas fa-plus fa-fw mr-1"></i>Add New

            </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sliders as $slider)
                    <tr>
                        <td>{{$slider->title}}</td>
                        <td><img width="60" src="{{asset("storage/".$slider->media->path)}}"  alt="here"></td>
                        <td>{{$slider->active ? 'Active':'Disabled'}}</td>
                        <td>

                            <form  method="POST"  action="{{route('admin.toggleSliderUpdate',$slider->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-sm  {{$slider->active ? 'btn-danger' : 'btn-success' }} ">
                                    {{$slider->active ? 'Make Inactive' : 'Make Active' }}
                                </button>
                            </form>
                        </td>



                   </tr>
                  @empty
                        <tr>

                           <td colspan="3"><span>No Sliders Added Yet!</span></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
