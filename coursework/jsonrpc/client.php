<?php

/**
# Notes for my own understanding

Errors faced:

- tried calling script in the command line causing it to continously hang.
    - this is because php server is single threaded so can't be called recursively...
- wasn't setting data to json before using it in header or setup...
- so mainly, just issues with understanding the `php -S localhost` and formatting issues...
 */

require_once 'deps/request.php';
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


    public function execute(): string
    {
        $ch = $this->setup();
        $response = curl_exec($ch);

        if ($response === false) {
            return 'cURL Error: ' . curl_error($ch);
        }

        curl_close($ch);
        return $response;
    }

    public function __construct(RpcRequest $request, string $url)
    {
        $this->request = $request;
        $this->url = $url;
    }
}

// Test

// $thinkpad = new Thinkpad("23", "Thinkpad T42", "Beefy aswell", "./image03.jpg");
// $request = new RpcRequest("createThinkpad", $thinkpad, 510572);

// $client = new RpcClient($request, "http://localhost:8080/index.php");
// echo $client->execute();
