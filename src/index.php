<?php
use classes\HttpServer;
use classes\HttpRequest;
use classes\HttpResponse;


//Creating an http server on localhost:5000
$http = new HttpServer("localhost", 5000);

//Starting http server
$http->run_server();

//the request '/test' will execute the code below
$http->on_request("/test", function (HttpRequest $req, HttpResponse $res){
    $res->set_charset("utf-8");
    $res->response('<span>Your IP: '.$req->get_user_ip().'</span>');
});
