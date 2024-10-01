@extends('adminlte::page')

@section('title', 'Sliders')

@section('js')
    <script type="text/javascript">
        function deleteSlider(id){
            if(confirm('Are You sure you want to delete this Slider?')){
                document.querySelector('#delete-'+ id).submit();
            }
        }
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Sliders</h3>
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
                        <th>URL</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sliders as $slider)
                    <tr>
                        <td>{{$slider->title}}</td>
                        <td><a class="btn btn-sm btn-success" href="{{$slider->url}}">URL</a></td>
                        <td><img width="60" src="{{asset("storage/".$slider->media->path)}}"  alt="here"></td>
                        <td>{{$slider->active ? 'Active':'Disabled'}}</td>
                        <td>
                            <a class="px-2" href="{{ route('admin.sliders.edit', $slider->id) }}"><i class="fa fa-pen"></i></a>
                            <a href="#" onclick="deleteSlider({{$slider->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$slider->id}}" action="{{route('admin.sliders.destroy',$slider->id)}}">
                                @csrf
                                @method('DELETE')
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
