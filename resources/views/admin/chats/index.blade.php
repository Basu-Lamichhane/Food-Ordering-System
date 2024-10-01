@extends('adminlte::page')
@section('title', 'Order Messages')


@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Active Chats of Orders</h3>

        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>SENT By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($chats as $chat)
                    @if ($chat->user->roleName()=="User")
                    <tr>
                        <td>Order #{{$chat->order_id}} <span class="badge bg-{{\App\Services\VegOrDrink::status($chat->order->status)}}">Order Status:{{$chat->order->status}}</span> </td>
                        <td>{{$chat->user->name}}</td>
                        <td>
                            <a href="{{url("dashboard/chat/".$chat->id)}}" >Reply</a>
                        </td>

                   </tr>
                    @endif
                  @empty
                        <tr>
                           <td colspan="3"><span>No Chats</span></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var time = new Date().getTime();
                    $(document.body).bind("mousemove keypress", function(e) {
                        time = new Date().getTime();
                    });
        function refresh() {
            if(new Date().getTime() - time >= 5000)
            window .location.reload();
            else
            setTimeout(refresh, 5000);
        }
        window.setInterval('refresh()', 5000);
                    </script>

@stop
