<?php

/**
Goal is to read in the request, decode it
then handle it
and return something based on what is required
 */

require 'response.php';
require 'error.php';
require 'thinkpads.php':

// TODO Get this class finished and tested 
class RpcServer
{
    /**
     * Function that receives a JSON string from a requset
     * @return string $request  JSON request as a string
     */
    private function receiveRequest()
    {
        $body = file_get_contents('php://input');
        $request = json_decode($body);
        return $request;
    }

    /**
     * Checks if RPC request is in valid format.
     * @return int 0 is success, otherwise -1.
     */
    public function rpcFormatCheck($request)
    {
        $jsonrpc = $request->jsonrpc;
        $method = $request->method;
        $id = $request->id;

        if ($jsonrpc != "2.0") {
            return -1;
        }

        if ($method == null) {
            return -1;
        }

        if ($id == null) {
            return -1;
        }

        return 0;
    }

    /**
    * Function to handle an incoming request
    * @param $request Incoming request as a Deserialized JSON string.
    */
    public function handleRequest($request)
    {
        if ($request == null) {
            $error = new RpcError(-32600, "Request was invalid.");
            return new RpcResponse(null, $error->getError(), null);
        }

        $method = $request->method;
        $params = $request->params;

        $jsonrpc = "2.0";
        $id = $request->id;

        switch ($method) {
            // TODO implement all the methods
            default:
                $error = new RpcError(-32601, "Method not found.");
                return new RpcResponse(null, $error, null);
                break;
        }


        // TODO Check if request is in correct format
        // TODO Check the method
    }

    // TODO Implement this function
    public function respond()
    {
        $request = $this->receiveRequest();

        if ($request == null) {
        }

        echo "hi!";
    }
}
