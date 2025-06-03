<?php

/**
didn't send a response
wasn't sending back json...
needs handled by a server/response handler
that will be done another time me thinks
*/

include 'deps/server.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = new RpcServer();

echo $server->respond();

exit;
