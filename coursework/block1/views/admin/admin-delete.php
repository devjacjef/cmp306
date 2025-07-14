<?php

// Could put a "confirm you're going to delete but not really bothered right now"
require __DIR__ . '/../../controller/client.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['id'])) {
      $request = new RpcRequest("deleteThinkpad", $_POST['id'], "510572");
   $client = new RpcClient($request, "https:/mayar.abertay.ac.uk/~2207061/cmp306/coursework/jsonrpc/");
      $client->execute();
   }

   header('Location: /~2207061/cmp306/coursework/block1/views/admin/');
   exit;
}
