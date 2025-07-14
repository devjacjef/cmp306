<?php

require "error.php";

// Response gets sent from the server to the client
 
class RpcResponse implements JsonSerializable
{
    private $jsonrpc;
    private $result; // this is the json rpc as text
    private $error; // this is going to store an assoc array
    private $id;

    public function __construct($result = null,  $error = null, $id)
    {
        $this->jsonrpc = "2.0";
        $this->result = $result;
        $this->error = $error;
        $this->id = $id;
    }

    public function jsonSerialize()
    {
        return [
            'jsonrpc' => $this->jsonrpc,
            'result' => $this->result,
            'error' => $this->error,
            'id' => $this->id
        ];
    }

    public function toJson()
    {
        return json_encode($this);
    }
}
