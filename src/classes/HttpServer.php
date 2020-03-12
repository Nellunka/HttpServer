<?php
namespace classes;

use classes\http_responses;
use classes\http_responses;
use php\lang\Thread;
use php\lang\Environment;
use php\net\ServerSocket;
use php\net\SocketException;

class HttpServer {

    private $webSocket;
    private $server_settings = [
        "host_settings" => [
            "ip" => "127.0.0.1",
            "port" => 80
        ]
    ];

    public function __construct($ip = "127.0.0.1", $port = 80){
        $this->webSocket = new ServerSocket();
        $this->server_settings["host_settings"]["ip"] = $ip;
        $this->server_settings["host_settings"]["port"] = $port;

    }

    public function run_server(){
        $ip = $this->server_settings["host_settings"]["ip"];
        $port = $this->server_settings["host_settings"]["port"];
        try {
            $this->webSocket->bind($ip, $port);
        } catch (SocketException $e) {
            echo "Socket binding error (".$ip.":".$port."): ".$e->getMessage()."\n";
        }
    }

    public function on_request($request, callable $runnable){
        new Thread(function () use ($request, $runnable){
            while($ac = $this->webSocket->accept()){
                try {
                    $response = new http_responses();
                    $in = $ac->getInput()->read(2**24);
                    $get = trim(" ".explode("GET", explode("HTTP", $in)[0])[1]." ");
                    $result = "";
                    if($get == $request){
                        $runnable(new HttpRequest($in, $this->webSocket, $ac), new HttpResponse($response));
                    } else {
                        $response->type = "400";
                    }

                    $ac->getOutput()->write($response->get_response());
                    //$ac->close();
                } catch (SocketException $e){
                    echo "Socket write error!: ".$e->getMessage()."\n";
                }
            }
        })->start();

    }

}