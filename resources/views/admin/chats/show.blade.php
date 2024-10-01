@extends('adminlte::page')
@section('title', 'Order Messages')


@section('content')
    <x-alert/>

        <!-- DIRECT CHAT -->
        <div class="card direct-chat direct-chat-warning" id="page">
          <div class="card-header">
            <h3 class="card-title">Chat for ORDER #{{$chat->order_id}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages " style="height:500px;" id="chatbox">
              <!-- Message. Default to the left -->
              @foreach ($order->chat as $message)
              @if ($message->user_id == auth()->user()->id)
              <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-right">{{$message->user->name}}</span>
                  <span class="direct-chat-timestamp float-left">{{$message->created_at->diffForHumans()}}</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="{{url('https://ui-avatars.com/api/?name='.$message->user->name)}}">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    {{$message->text}}
                </div>
                <!-- /.direct-chat-text -->
              </div>
              @else
              <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left">{{$message->user->name}} </span>
                  <span class="direct-chat-timestamp float-right">{{$message->created_at->diffForHumans()}}</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="{{url('https://ui-avatars.com/api/?name='.$message->user->name)}}">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    {{$message->text}}
                </div>
                <!-- /.direct-chat-text -->
              </div>
              <!-- /.direct-chat-msg -->
              @endif
              @endforeach
            </div>
            <!--/.direct-chat-messages-->


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <form action="{{route('dashboard.chat.store')}}" method="post">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
              <div class="input-group">
                <input type="text" name="text" placeholder="Type Message ..." class="form-control">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-warning">Send</button>
                </span>
              </div>
            </form>
          </div>
          <!-- /.card-footer-->
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Information for Order #{{$order->id}}</h3>
                <div class="card-tools">
                    <div class="badge bg-success">Ordered On: {{\Carbon\Carbon::parse($order->created_at)->timezone('Asia/Kathmandu')->toDayDateTimeString() }}</div>
                </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Ordered By:</td>
                        <td>{{$order->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Contact Info</td>
                        <td>{{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Order Status</td>
                        <td><span class="badge bg-{{\App\Services\VegOrDrink::status($order->status)}}">{{$order->status}}</span></td>
                    </tr>
                   <tr>
                       <td>Payment</td>
                    <td>{{$order->payment_method}}</td>
                   </tr>
                   <tr>
                       <td>Subtotal</td>
                       <td> NPR.{{$order->subtotal}}</td>
                   </tr>
                   <tr>
                       <td>Discount</td>
                       <td> {{$order->discount}} %</td>
                   </tr>
                   <tr>
                    <td>Total</td>
                    <td> NPR.{{$order->total}}</td>
                </tr>

                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            var objDiv = document.getElementById("chatbox");
          objDiv.scrollTop = objDiv.scrollHeight;

          </script>
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
