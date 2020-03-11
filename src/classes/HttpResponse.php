<?php
namespace classes;


class HttpResponse
{
    private $response;

    public function __construct($response){
        $this->response = $response;
    }

    public function set_charset($charset){
        $this->response->charset = $charset;
    }

    public function get_server_http_version(){
        return $this->response->http_version;
    }

    public function response($response){
        $this->response->content = $response;
    }

    public function get_charset(){
        return $this->response->charset;
    }

    public function set_status_code($status){
        $this->response->type = $status;
    }

}