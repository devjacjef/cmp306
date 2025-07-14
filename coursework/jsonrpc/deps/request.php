<?php

// Request object
class RpcRequest implements JsonSerializable
{
    private string $jsonrpc;
    private string $method;
    private $params;
    private $id;

    /**
     * This sets up the request to be sent.
     */
    public function __construct($method, $params, $id)
    {
        $this->jsonrpc = "2.0";
        $this->method = $method;
        $this->params = $params;
        $this->id = $id;
    }

    // Return the object as associative array
    public function assoc()
    {
        return [
            'jsonrpc' => $this->jsonrpc,
            'method' => $this->method,
            'params' => $this->params,
            'id' => $this->id
        ];
    }

    // Return request as json
    public function jsonSerialize()
    {
        return [
            'jsonrpc' => $this->jsonrpc,
            'method' => $this->method,
            'params' => $this->params,
            'id' => $this->id
        ];
    }

    public function toJson()
    {
        return json_encode($this);
    }

    // Return deserialized object
    public function fromJson(string $json): self
    {
        $data = json_decode($json, true);
        return new self($data['method'], $data['params'], $data['imageUrl']);
    }

    public function length(): int {
        $clength = strlen($this->toJson());
        return $clength;
    }
}
