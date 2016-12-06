@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        You are logged in!
                    </div>
                    {{--<a href="{{url('notification/sendBroadcast')}}">result</a>--}}
                    <a id="sendBroadcast" href="#">click</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
//    var socket = io('http://192.168.10.10:3000');
//    socket.on("test-channel:App\\Events\\BroadcastEvent", function(message){
//        console.log('test');
//    });
    $('#sendBroadcast').on('click',function () {
        $.ajax({
            url: '{{url('notification/sendBroadcast')}}',
            data: {
                "_token"    : "{{ csrf_token() }}",
            },
            type: 'POST',
            context: this,
            dataType: 'Json',
            success: function (data) {
            }
        });
//        socket.emit("message", {msg: "message"});
    });

</script>
@endsection