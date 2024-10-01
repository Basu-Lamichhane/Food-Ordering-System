@extends('adminlte::page')

@section('title', 'Sections')

@section('js')
    <script type="text/javascript">
        function deleteSection(id){
            if(confirm('Are You sure you want to delete this Section?')){
                document.querySelector('#delete-'+ id).submit();
            }
        }
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Sections</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{route('admin.sections.create')}}"><i class="fas fa-plus fa-fw mr-1"></i>Add New

            </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sections as $section)
                    <tr>
                        <td>{{$section->id}}</td>
                        <td>{{$section->name}}   ({{$section->products?->count()}} Products)</td>
                        <td>
                            <a href="{{url('admin/sections/'.$section->id)}}" class="btn btn-sm btn-success"><i class="fa fa-cogs"></i> Manage Section</a>
                            <a class="px-2" href="{{ route('admin.sections.edit', $section->id) }}"><i class="fa fa-pen"></i></a>
                            <a href="#" onclick="deleteSection({{$section->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$section->id}}" action="{{route('admin.sections.destroy',$section->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>



                   </tr>
                  @empty
                        <tr>

                           <td colspan="3"><span>No Sections Added Yet!</span></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
