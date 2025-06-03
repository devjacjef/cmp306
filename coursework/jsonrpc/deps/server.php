<?php

/**
Goal is to read in the request, decode it
then handle it
and return something based on what is required
 */

include 'response.php';

// TODO MAYBE BETTER NAMING
class RpcServer
{
    // dont need to store body
    // private response $response;

    // TODO Test this function
    private function receiveRequest()
    {
        $body = file_get_contents('php://input');
        $request = json_decode($body);
        return $request;
    }

    // todo implement this function
    public function jsonformatcheck($request) {}

    // todo implement this function
    public function rpcformatcheck($request)
    {
        $jsonrpc = $request->jsonrpc;
        $method = $request->method;
        $id = $request->id;

        if ($jsonrpc != "2.0") {
            return 0;
        }

        if ($method == null) {
            return 0;
        }

        if ($id == null) {
            return 0;
        }

        return 1;
    }

    public function methodparamscheck($method, $params)
    {
        // TODO Implement statement.
        switch ($method) {
            case "getAllThinkpads":
                break;
            case "getThinkPadbyid":
                break;
            case "createThinkpad":
                break;
            case "deleteThinkpad":
                break;
            case "updateThinkpad":
                break;
            default:
                break;
        }
    }

    // TODO Implement this function
    public function handleRequest($request)
    {
        $response = "Hi";

        return json_encode($response);
    }

    // TODO Implement this function
    public function respond()
    {
        $request = $this->receiveRequest();

        $response = $this->handleRequest($request);
        // Check request
        // Handle the request
        // Return a response
        return $response;
    }
}
