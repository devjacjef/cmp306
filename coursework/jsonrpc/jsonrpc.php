<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'client.php';
require_once 'deps/request.php';

// $thinkpad = new Thinkpad("22", "Thinkpad T41", "Beefy", "./image03.jpg");
// $request = new RpcRequest("createThinkpad", $thinkpad, 510572);

// TODO Need to test all functionality.

$client = new RpcClient($request, "http://localhost:8080/index.php");
// Forgot to echo the output cause im a numpty originally...
echo $client->execute();
