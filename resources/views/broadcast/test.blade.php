<?php
/**
 * Created by PhpStorm.
 * User: le.van.hai
 * Date: 12/6/2016
 * Time: 8:36 AM
 */
@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
    <script>
        //var socket = io('http://localhost:3000');
        var socket = io('http://127.0.0.2:6379');
        socket.on("channel-name:App\\Events\\BroadcastEvent", function(message){
            // increase the power everytime we load test route
            console.log('test');
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop