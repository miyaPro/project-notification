var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
// var Echo = require("laravel-echo") ;
server.listen(9090);
io.on('connection', function (socket) {

    console.log("new client connected!");

    var redisClient2 = redis.createClient();
    redisClient2.subscribe('message');
    // console.log(redisClient2);
    redisClient2.on("message", function(channel, message){
       console.log('reponse test-channel ' + message);
        socket.emit(channel, message);
    });

});