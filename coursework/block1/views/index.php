<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/../controller/client.php';

$request = new RpcRequest("getAllThinkpads", "", "510572");
$client = new RpcClient($request, "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/jsonrpc/");

$response = $client->execute();

$thinkpads = [];

$thinkpad = new Thinkpad(0, "", "", "", 0.00, 0);
foreach ($response as $r) {
   $thinkpads[] = $thinkpad->fromJson($r->resultJson());
}

require 'partials/login.php';
include 'partials/card.php';
?>


<?php

require __DIR__ . '/partials/footer.php';
