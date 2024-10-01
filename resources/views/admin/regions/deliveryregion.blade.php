@extends('adminlte::page')

@section('title', 'Assign Region')
@section('plugins.Select2', true)

@section('js')

<script>
    $(document).ready(function() {
    $('#region_id').select2();
});
</script>

@endsection

@section('content')
<x-alert/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                      Assign Location to Delivery Guy
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Assigned</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $deliverys as $delivery )
                            <tr>
                                <td>{{$delivery->id}}</td>
                                <td>{{$delivery->name}}</td>
                                <td>{{$delivery->email}}</td>
                                <td>{{$delivery->regionName()}}</td>
                                
                            </tr>  
                            <tr>
                                    <form action="{{route('admin.assignregion')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$delivery->id}}">
                                <td colspan="2">
                                    
                                    <select name="region_id" name="region_id" id="region_id"
                           class="form-control @error('region_id') is-invalid @endif">
                           @forelse ($regions as $region)
                           <option value="{{$region->id}}">{{$region->name}}</option>
                           @empty
                           <option>No Regions found</option>
                           @endforelse
                          
                           
                    </select>       
                                </td>
                                <td colspan="2"><button type="submit" class="btn btn-sm btn-success">Assign Region</button></td>
                                
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
    </div>
@stop
