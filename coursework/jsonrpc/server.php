<?php

ob_start();
register_shutdown_function(function () {
   $output = ob_get_clean();
   error_log("Output Buffer:\n" . $output);
   echo $output;
});


require 'deps/response.php';
require 'deps/request.php';
require 'api-thinkpads.php';

// TODO Testing and Bugfixes
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
      return new RpcRequest($request->method, $request->params, $request->id);
   }

   /**
    * Checks if RPC request is in valid format.
    * @return int 0 is success, otherwise -1.
    */
   private function rpcFormatCheck($request)
   {
      $r = $request->assoc();

      $jsonrpc = $r['jsonrpc'];
      $method = $r['method'];
      $id = $r['id'];

      if ($jsonrpc != "2.0") {
         return false;
      }

      if ($method == null) {
         return false;
      }

      if ($id == null) {
         return false;
      }

      return true;
   }

   /**
    * Function to handle an incoming request
    * @param $request Incoming request as a Deserialized JSON string.
    */
   private function handleRequest($request)
   {
      if ($request == null) {
         $error = new RpcError(-32600, "Request was invalid.");
         return new RpcResponse(null, $error->getError(), null);
      }

      if (!$this->rpcFormatCheck($request)) {
         $error = new RpcError();
         return new RpcResponse(-32700, "The request was in the incorrect format.", null);
      }

      $r = $request->assoc();

      $method = $r['method'];
      $params = json_encode($r['params']);

      $jsonrpc = "2.0";

      $id = $r['id'];

      switch ($method) {
         case "getAllThinkpads":
            return new RpcResponse(getAllThinkpads(), null, $id);
            break;
         case "getThinkpadById":
            return new RpcResponse(getThinkpadById($params), null, $id);
            break;
         case "createThinkpad":
            return new RpcResponse(createThinkpad($params), null, $id);
            break;
         case "deleteThinkpad":
            return new RpcResponse(deleteThinkpad($params), null, $id);
            break;
         case "updateThinkpad":
            return new RpcResponse(updateThinkpad($params), null, $id);
            break;
         default:
            $error = new RpcError(-32601, "Method not found.");
            return new RpcResponse(null, $error, null);
            break;
      }

      $error = new RpcError(-32603, "There was an internal JSON-RPC error", $id);
      return new RpcResponse(null, $error, $id);
   }


   public function respond()
   {
      $request = $this->receiveRequest();

      $response = $this->handleRequest($request);

      echo json_encode($response);
   }
}
