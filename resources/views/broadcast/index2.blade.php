@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <div id="number">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var socket = io.connect('http://192.168.10.10:9090');
        socket.on('message', function (data) {
            $( "#number" ).text(parseInt( $('#number').text()) + 1);
        });
//        var Echo = require('laravel-echo');
//        window.Echo.channel('message')
//            .listen('App\\Events\\DemoEvent', function () {
//                console.log('test laravel echo ');
//        });
        window.Echo.channel('message')
            .listen('DemoEvent', (e) => {
                console.log('Hello World!', e);
            });

    </script>
@endsection
