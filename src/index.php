<?php
use classes\HttpServer;
use classes\HttpRequest;
use classes\HttpResponse;


$http = new HttpServer("localhost", 5000);
$http->run_server();
$http->on_request("/", function (HttpRequest $req, HttpResponse $res){
    $res->set_charset("utf-8");
    $res->response('<span>Ваш IP: '.$req->get_user_ip().'</span>');
});
