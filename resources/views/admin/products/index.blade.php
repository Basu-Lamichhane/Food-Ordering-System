@extends('adminlte::page')

@section('title', 'Products')

@section('js')
    <script type="text/javascript">
        function deleteProduct(id){
            if(confirm('Are You sure you want to delete this Product?')){
                document.querySelector('#delete-'+ id).submit();
            }
        } 
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All products</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{route('admin.products.create')}}"><i class="fas fa-plus fa-fw mr-1"></i>Add New
                
            </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td><img width="60" src="{{asset("storage/".$product->media->path)}}"  alt="here"></td>
                        <td> <i class="fa {{ App\Services\VegOrDrink::icon($product->isVeg,$product->isDrink)}}"></i> {{$product->name}}</td>
                        <td>NPR. {{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a class="px-2" href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-pen"></i></a>
                            <a href="#" onclick="deleteProduct({{$product->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$product->id}}" action="{{route('admin.products.destroy',$product->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                
                    
                    
                   </tr>  
                  @empty
                        <tr>
                           
                           <td colspan="3"><span>No products Added Yet!</span></td>
                            
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
