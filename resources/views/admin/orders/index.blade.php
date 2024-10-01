@extends('adminlte::page')

@section('title', 'Orders')

@section('js')
<script type="text/javascript">
    function deleteOrder(id) {
        if (confirm('Are You sure you want to delete this Order?')) {
            document.querySelector('#delete-' + id).submit();
        }
    }
</script>
@endsection

@section('content')
<x-alert />
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Orders</h3>
        <div class="card-tools">

            </a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Client</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td> #{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>
                        <form action="{{route('admin.notify')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$order->user_id}}">
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <button class="btn btn-success btn-sm"><i class="fa fa-bell"></i> Notify</button>
                        </form>
                        <a class="px-2" href="{{url('admin/orders/'.$order->id)}}"><i class="fa fa-eye"></i></a>

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

@stop