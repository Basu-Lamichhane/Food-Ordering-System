@extends('adminlte::page')

@section('title', 'Delivery Dashboard')
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
                              <span class="info-box-text">Pending Delivery</span>
                              <span class="info-box-number">
                              {{$orders->where('status','Processed')->count()}}
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
                              <span class="info-box-text">Under Delivery</span>
                              <span class="info-box-number"> {{$orders->where('status','Delivering')->count()}}</span>
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
    </div>
@stop
