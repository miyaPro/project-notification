var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(9090);
io.on('connection', function (socket) {

    console.log("new client connected!");
    // var redisClient = redis.createClient();
    // redisClient.subscribe('message');
    //
    // redisClient.on("message", function(channel, message) {
    //     /* console.log('reponse');
    //      console.log(message + "channel");*/
    //     console.log(channel);
    //     socket.emit(channel, message);
    // });

    /* socket.on('disconnect', function() {
     redisClient.quit();
     });*/

    var redisClient2 = redis.createClient();
    redisClient2.subscribe('message');
    // console.log(redisClient2);
    redisClient2.on("message", function(channel, message) {
       console.log('reponse test-channel');
         console.log(message + "channel test-channel");
        console.log(channel);
        socket.emit(channel, message);
    });

});