<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/../controller/client.php';

/* $request = new RpcRequest("getAllThinkpads", "", "510572"); */
/* $client = new RpcClient($request, "http://127.0.0.1/cmp306/coursework/jsonrpc/"); */

/* $response = $client->execute(); */

/* $thinkpads = []; */
/**/
/* $thinkpad = new Thinkpad(0, "", "", "", 0.00); */
/* foreach ($response as $r) { */
/*    $thinkpads[] = $thinkpad->fromJson($r->resultJson()); */
/* } */

// Set image path later
/* $image = '/cmp306/coursework/block1/images/' . $thinkpad->getImageUrl(); */

$thinkpad = new Thinkpad("23", "Thinkpad T42", "Beefy aswell", "./image03.jpg", 19.99);
$request = new RpcRequest("createThinkpad", $thinkpad, 510572);


$client = new RpcClient($request, "http://127.0.0.1/cmp306/coursework/jsonrpc/");
echo '<pre>';
print_r($client);
echo '</pre>';
$response = $client->execute();
include 'partials/card.php';
?>


<?php

require __DIR__ . '/partials/footer.php';
