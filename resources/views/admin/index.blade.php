@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">Admin Panel</h3>
      </div>
</div>
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
  <div class="row">
    <div class="col-lg-6">
      <div class="card ">
        <div class="card-header border-0">
          <h3 class="card-title">Line Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="chart" id="barchart_material" style="width: 100%; height:  100%;"></div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header border-0">
          <h4 class="card-title">Orders on Regions</h4>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart" id="location-orders" style="width: 100%; height: 100%;"></div>
        </div>
      </div>
    </div>
  </div>



  @section('js')
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
          ['Day', 'Sales'],

          @php
            foreach($orders as $order) {
                echo "['".$order->created_at->format('dMY')."', ".$order->total."],";
            }
          @endphp
      ]);

      var options = {
        title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
      };
      var chart = new google.visualization.LineChart(document.getElementById('barchart_material'));
      chart.draw(data, options);
    }
  </script>
    <script type="text/javascript">
      var locorder = <?php echo $locorder; ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(locorder);
        var options = {
          title: 'Orders on Different Regions',
        };
        var chart = new google.visualization.PieChart(document.getElementById('location-orders'));
        chart.draw(data, options);
      }
    </script>
  @endsection
@stop
