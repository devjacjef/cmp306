<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/../controller/client.php';

$request = new RpcRequest("getAllThinkpads", "", "510572");
$client = new RpcClient($request, "http://127.0.0.1/cmp306/coursework/jsonrpc/");

echo $client->execute();

require __DIR__ . '/partials/footer.php';
