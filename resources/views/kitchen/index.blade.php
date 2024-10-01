@extends('adminlte::page')

@section('title', 'Kitchen Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Kitchen Dashboard</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cart-plus"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Pending Orders</span>
                              <span class="info-box-number">
                              {{$orders->where('status','Pending')->count()}}
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cogs"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Processed Orders</span>
                              <span class="info-box-number"> {{$orders->where('status','Processed')->count()}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Total Orders</span>
                              <span class="info-box-number"> {{$orders->count()}} </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                      </div>
            </div>
        </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Recent Orders for Kitchen</h3>

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Client</th>

                        <th>Order Status</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                     
                        <td> #{{$order->id}}</td>
                       <td>{{$order->user->name ?? 'N/A'}}</td> <!-- Display user name -->

                        <td>{{$order->status}}</td>

                        <td>

                            <a class="px-2" href="{{url('kitchen/orders/'.$order->id)}}"><i class="fa fa-eye"></i> Manage</a>

                        </td>



                   </tr>

                  @empty
                        <tr>

                           <td colspan="3"><span>No Orders Made Yet!</span></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
     </div>
    </div>
    </div>

@stop
