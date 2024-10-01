<div class="flex flex-col bg-white">
  <div class="box border-2 text-gray-800 p-3 m-1">
     <b>Chat for Order #11</b>
    <a href="{{url("orders/$order->id#chatbox")}}" class=" border-2 text-gray-800 px-2 float-right" target="_self" onClick=“return false;top.location.href=this.href;”>
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M19.95 11a8 8 0 1 0 -.5 4m.5 5v-5h-5" />
</svg>

    </a>

   </div>

  <div id="chat"  class="flex  mt-2 flex-col overflow-y-scroll h-60	 space-y-3 mb-20 pb-3 ">
  @foreach ($order->chat as $message)
   @if ($message->user_id == auth()->user()->id)
   <div class="w-max ml-auto break-all mt-2 mb-1 p-2 rounded-br-none bg-blue-500 rounded-2xl text-white text-left mr-5">
   {{$message->text}}
  </div>
  <div class="text-xs text-right mr-5 text-gray-500">{{$message->created_at->diffForHumans()}}</div>
   @else
   <div class="other break-all mt-2  ml-5 rounded-bl-none float-none bg-gray-300 mr-auto rounded-2xl p-2">

    <b class="text-xs">{{$message->user->roleName()}}</b>
     <p>{{$message->text}}</p>

    </div>
    <div class="text-xs text-left ml-5 text-gray-500">{{$message->created_at->diffForHumans()}}</div>

   @endif


    @endforeach


  </div>
  <div class="flex flex-row  items-center  bottom-0 my-2 w-full">
    <div
      class="ml-2 flex flex-row border-gray items-center w-full border rounded-xl mr-1 h-12 px-2"
    >
      <form action="{{route("usendmsg")}}" method="POST">
          @csrf

      <div class="w-full">
        <input
          type="text"
          id="message"
          name="text"
          required
          class="border rounded-md border-transparent w-full focus:outline-none text-sm h-10 flex items-center"
          placeholder="Type your message...."
        />
      </div>

    </div>
    <input type="hidden" name="order_id" value="{{$order->id}}">
    <div>
        <button
         id="self"
         type="submit"
        class="flex items-center justify-center h-10 w-10 mr-2 rounded-full bg-gray-200 hover:bg-gray-300 text-indigo-800 focus:outline-none"
      >
        <svg
          class="w-5 h-5 transform rotate-90 -mr-px"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
          ></path>
        </svg>
      </button>
    </form>

    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  var objDiv = document.getElementById("chat");
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
