@extends('adminlte::page')

@section('title', 'Sections')
@section('plugins.Select2', true)

@section('js')
    <script type="text/javascript">

        function deleteProduct(id){
            if(confirm('Are You sure you want to delete this Product from the section?')){
                document.querySelector('#delete-'+ id).submit();
            }
        }
    </script>
@endsection

@section('content')
    <x-alert/>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark m-2">Section: {{$section->name}}</h3>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Products on Section</h3>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($section->products as $product)
                    <tr>
                        <td><img width="60" src="{{asset("storage/".$product->media->path)}}"  alt="here"></td>
                        <td>{{$product->name}}</td>
                        <td>

                            <a href="#" onclick="deleteProduct({{$product->id}})"><i class="fa fa-trash"></i></a>
                            <form style="display:none" method="POST" id="delete-{{$product->id}}" action="{{route('admin.deleteproductSection')}}">
                                @csrf
                                <input type="hidden" name="section_id" value="{{$section->id}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                            </form>
                        </td>



                   </tr>
                  @empty
                        <tr>

                           <td colspan="3"><span>No Products on Section</span></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-2 m-2">
        <h2>Add Product to Section</h2>
        <form action="{{route('admin.addproductSection')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="section_id" value="{{$section->id}}">

                 <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" name="product_id" id="product_id"
                           class="form-control @error('product_id') is-invalid @endif">
                           @forelse ($products as $product)
                           <option value="{{$product->id}}">{{$product->name}}</option>
                           @empty
                           <option>No product</option>
                           @endforelse


                    </select>
                    @error('product')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-list-alt fa-fw mr-1"></i> Add to Section
                </button>
            </form>
    </div>
@stop
