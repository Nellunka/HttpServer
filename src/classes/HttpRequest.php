<?php
namespace classes;


class HttpRequest
{
    private $request_arr;
    private $request;
    private $socket;
    private $accept;

    public function __construct($request, $socket, $accept){
        $this->request = $request;
        $this->socket = $socket;
        $this->accept = $accept;
        $this->request_arr = explode("\n", $request);
    }

    public function get_user_ip(){
        return $this->accept->getAddress();
    }

    public function get_request(){
        return trim(" ".explode("GET", explode("HTTP", $this->request)[0])[1]." ");
    }

    public function get_user_http_version(){
        return explode(" ",$this->request_arr[0])[2];
    }

    public function get_useragent(){
        $return = "";
        foreach ($this->request_arr as $req){
            $exp = explode(":", $req);
            if($exp[0] == "User-Agent"){
                $return = trim(" ".$exp[1]." ");
                break;
            }
        }
        return $return;
    }


}