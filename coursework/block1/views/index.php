<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/../controller/client.php';

$request = new RpcRequest("getAllThinkpads", "", "510572");
$client = new RpcClient($request, "http://127.0.0.1/cmp306/coursework/jsonrpc/");

$response = $client->execute();

/**
 * TODO Implement cards
 */
$thinkpads = [];

/**
 * TODO Refactor into nicer code
 * Pretty much just loop through the code and construct an array of items
 */
foreach ($response as $r) {
   $thinkpad = new Thinkpad(0, "", "", "");
   $thinkpad = $thinkpad->fromJson($r->resultJson());
   echo $thinkpad->printModel();
}

require __DIR__ . '/partials/footer.php';
