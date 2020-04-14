<?php
namespace classes;

use php\lib\str;

class http_responses {

    public $serverName = "JPHP HTTP SERVER";
    public $type = "200";
    public $content;
    public $charset = "utf-8";
    public $http_version = "HTTP/1.1";

    public function get_response(){
        $return = "";
        $response_arr = [$this->http_version." ",
            "Date: Mon, 27 Jul 2009 12:28:53 GMT",
            "Server: ",
            "Last-Modified: Wed, 22 Jul 2009 19:15:56 GMT",
            "Content-Length: ",
            "Content-Type: text/html; charset=".$this->charset,
            "Connection: Closed",
            ""];
        switch ($this->type){
            case "404":
                $response_arr[0] .= "404 Not Found";
                break;
            case "200":
                $response_arr[0] .= "200 OK";
                break;
            case "100":
                $response_arr[0] .= "100 Continue";
                break;
            case "101":
                $response_arr[0] .= "101 Switching Protocols";
                break;
            case "102":
                $response_arr[0] .= "102 Processing";
                break;
            case "201":
                $response_arr[0] .= "201 Created";
                break;
            case "202":
                $response_arr[0] .= "202 Accepted";
                break;
            case "203":
                $response_arr[0] .= "203 Non-Authoritative Information";
                break;
            case "204":
                $response_arr[0] .= "204 No Content";
                break;
            case "205":
                $response_arr[0] .= "205 Reset Content";
                break;
            case "206":
                $response_arr[0] .= "206 Partial Content";
                break;
            case "207":
                $response_arr[0] .= "207 Multi-Status";
                break;
            case "208":
                $response_arr[0] .= "208 Already Reported";
                break;
            case "226":
                $response_arr[0] .= "226 IM Used";
                break;
            case "300":
                $response_arr[0] .= "300 Multiple Choices";
                break;
            case "301":
                $response_arr[0] .= "301 Moved Permanently";
                break;
            case "302":
                $response_arr[0] .= "302 Moved Temporarily";
                break;
            case "302":
                $response_arr[0] .= "302 Found";
                break;
            case "303":
                $response_arr[0] .= "303 See Other";
                break;
            case "304":
                $response_arr[0] .= "304 Not Modified";
                break;
            case "305":
                $response_arr[0] .= "305 Use Proxy";
                break;
            case "306":
                $response_arr[0] .= "306 Switch Proxy";
                break;
            case "307":
                $response_arr[0] .= "307 Temporary Redirect";
                break;
            case "308":
                $response_arr[0] .= "308 Permanent Redirect";
                break;
            case "400":
                $response_arr[0] .= "400 Bad Request";
                break;
            case "401":
                $response_arr[0] .= "401 Unauthorized";
                break;
            case "402":
                $response_arr[0] .= "402 Payment Required";
                break;
            case "403":
                $response_arr[0] .= "403 Forbidden";
                break;
            case "405":
                $response_arr[0] .= "405 Method Not Allowed";
                break;
            case "406":
                $response_arr[0] .= "406 Not Acceptable";
                break;
            case "407":
                $response_arr[0] .= "407 Proxy Authentication Required";
                break;
            case "408":
                $response_arr[0] .= "408 Request Timeout";
                break;
            case "409":
                $response_arr[0] .= "409 Conflict";
                break;
            case "410":
                $response_arr[0] .= "410 Gone";
                break;
            case "411":
                $response_arr[0] .= "411 Length Required";
                break;
            case "412":
                $response_arr[0] .= "412 Precondition Failed";
                break;
            case "413":
                $response_arr[0] .= "413 Payload Too Large";
                break;
            case "414":
                $response_arr[0] .= "414 URI Too Long";
                break;
            case "415":
                $response_arr[0] .= "415 Unsupported Media Type";
                break;
            case "416":
                $response_arr[0] .= "416 Range Not Satisfiable";
                break;
            case "417":
                $response_arr[0] .= "417 Expectation Failed";
                break;
            case "418":
                $response_arr[0] .= "418 I’m a teapot";
                break;
            case "419":
                $response_arr[0] .= "419 Authentication Timeout";
                break;
            case "421":
                $response_arr[0] .= "421 Misdirected Request";
                break;
            case "422":
                $response_arr[0] .= "422 Unprocessable Entity";
                break;
            case "423":
                $response_arr[0] .= "423 Locked";
                break;
            case "424":
                $response_arr[0] .= "424 Failed Dependency";
                break;
            case "426":
                $response_arr[0] .= "426 Upgrade Required";
                break;
            case "428":
                $response_arr[0] .= "428 Precondition Required";
                break;
            case "429":
                $response_arr[0] .= "429 Too Many Requests";
                break;
            case "431":
                $response_arr[0] .= "431 Request Header Fields Too Large";
                break;
            case "449":
                $response_arr[0] .= "449 Retry With";
                break;
            case "451":
                $response_arr[0] .= "451 Unavailable For Legal Reasons";
                break;
            case "499":
                $response_arr[0] .= "499 Client Closed Request";
                break;
            case "500":
                $response_arr[0] .= "500 Internal Server Error";
                break;
            case "501":
                $response_arr[0] .= "501 Not Implemented";
                break;
            case "502":
                $response_arr[0] .= "502 Bad Gateway";
                break;
            case "503":
                $response_arr[0] .= "503 Service Unavailable";
                break;
            case "504":
                $response_arr[0] .= "504 Gateway Timeout";
                break;
            case "505":
                $response_arr[0] .= "505 HTTP Version Not Supported";
                break;
            case "506":
                $response_arr[0] .= "506 Variant Also Negotiates";
                break;
            case "507":
                $response_arr[0] .= "507 Insufficient Storage";
                break;
            case "508":
                $response_arr[0] .= "508 Loop Detected";
                break;
            case "509":
                $response_arr[0] .= "509 Bandwidth Limit Exceeded";
                break;
            case "510":
                $response_arr[0] .= "510 Not Extended";
                break;
            case "511":
                $response_arr[0] .= "511 Network Authentication Required";
                break;
            case "520":
                $response_arr[0] .= "520 Unknown Error";
                break;
            case "521":
                $response_arr[0] .= "521 Web Server Is Down";
                break;
            case "522":
                $response_arr[0] .= "522 Connection Timed Out";
                break;
            case "523":
                $response_arr[0] .= "523 Origin Is Unreachable";
                break;
            case "524":
                $response_arr[0] .= "524 A Timeout Occurred";
                break;
            case "525":
                $response_arr[0] .= "525 SSL Handshake Failed";
                break;
            case "526":
                $response_arr[0] .= "526 Invalid SSL Certificate";
                break;
        }
        $bug_fix = "";
        for($i=0;$i<=strlen($this->content)*2;$i++){
            $bug_fix .= " ";
        }

        $this->content = $this->content.$bug_fix;

        $response_arr[2] .= $this->serverName;
        $response_arr[4] .= strlen($this->content);
        foreach ($response_arr as $response){
            $return .= $response."\n";
        }
        $return .= $this->content;
		
        return str::encode($return, $this->charset);
    }

}