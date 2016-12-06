var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
var port = "3000";
redis.subscribe('test-channel', function(err, count) {
    console.log('subscribe channel')
});
redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});
http.listen(port, function(){
    console.log('Listening on Port ' + port);
});