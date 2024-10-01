@extends('adminlte::page')

@section('title', 'regions')

@section('js')
    <script type="text/javascript">
        function deleteRegion(id){
            if(confirm('Are You sure you want to delete this Region?')){
                document.querySelector('#delete-'+ id).submit();
            }
        }
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Regions</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{route('admin.regions.create')}}"><i class="fas fa-plus fa-fw mr-1"></i>Add New

            </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Region ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($regions as $region)
                    <tr>
                        <td>{{$region->id}}</td>
                        <td>{{$region->name}}</td>
                        <td>
                            <a class="px-2" href="{{ route('admin.regions.edit', $region->id) }}"><i class="fa fa-pen"></i></a>
                            <a href="#" onclick="deleteRegion({{$region->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$region->id}}" action="{{route('admin.regions.destroy',$region->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>



                   </tr>
                  @empty
                        <tr>

                           <td colspan="3"><span>No regions Added Yet!</span></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
