@extends('adminlte::page')

@section('title', 'Categories')

@section('js')
    <script type="text/javascript">
        function deleteCategory(id){
            if(confirm('Are You sure you want to delete this Category?')){
                document.querySelector('#delete-'+ id).submit();
            }
        } 
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Categories</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{route('admin.categories.create')}}"><i class="fas fa-plus fa-fw mr-1"></i>Add New
                
            </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{Str::of($category->description)->limit(12)}}</td>
                        <td>
                            <a class="px-2" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-pen"></i></a>
                            <a href="#" onclick="deleteCategory({{$category->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$category->id}}" action="{{route('admin.categories.destroy',$category->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                
                    
                    
                   </tr>  
                  @empty
                        <tr>
                           
                           <td colspan="3"><span>No Categories Added Yet!</span></td>
                            
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
