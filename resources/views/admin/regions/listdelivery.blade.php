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
                    Delivery Service Locations
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
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
    </div>
@stop
