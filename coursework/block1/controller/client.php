<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
# Notes for my own understanding

Errors faced:

- tried calling script in the command line causing it to continously hang.
    - this is because php server is single threaded so can't be called recursively...
- wasn't setting data to json before using it in header or setup...
- so mainly, just issues with understanding the `php -S localhost` and formatting issues...
 */

require_once 'deps/request.php';
require_once 'deps/response.php';
require_once 'deps/thinkpad.php';

class RpcClient
{
   private RpcRequest $request;
   private $url;

   /**
    Function to setup headers for the request
    */
   private function headers(): array
   {
      $json = $this->request->toJson();
      return [
         'Content-Type: application/json',
         'Content-Length: ' . strlen($json)
      ];
   }

   /**
    Function to setup the request handler.
    */
   private function setup()
   {
      $json = $this->request->toJson();

      $ch = curl_init($this->url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers());
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_VERBOSE, true);

      return $ch;
   }

   public function decodeResponse($response)
   {
      $res = json_decode($response);

      echo '<pre>';
      print_r($response);
      echo '</pre>';
      $resultItem = json_decode($res->result, true);

      $something = [];

      foreach ($resultItem as $item) {
         $something[] = new RpcResponse($item, $res->error, $res->id);
      }

      return $something;
   }


   public function execute()
   {
      $ch = $this->setup();
      $response = curl_exec($ch);

      if ($response === false) {
         return 'cURL Error: ' . curl_error($ch);
      }

      curl_close($ch);

      return $this->decodeResponse($response);
   }

   public function __construct(RpcRequest $request, string $url)
   {
      $this->request = $request;
      $this->url = $url;
   }
}
