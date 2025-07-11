<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/client.php';

$request = new RpcRequest("getThinkpadById", $_GET['id'], "510572");

$client = new RpcClient($request, "http://localhost/cmp306/coursework/jsonrpc/");

$response = $client->execute();

$thinkpad = Thinkpad::fromJson($response->resultJson());

?>

<div class="container m-4">
   <button class="btn btn-primary" onclick="window.history.back();">Go Back</button>
   <div class="d-flex container align-items-center justify-content-center">
      <div class="d-flex align-items-center">
         <img src="<?= $thinkpad->getImageUrl() ?>" alt="Product Image" class="img-fluid" style="max-width: 256px;">
         <div class="container">
            <p class="mb-0"><?= $thinkpad->getModel() ?></p>
            <p class="mb-0"><?= $thinkpad->getDescription() ?></p>
            <p class="mb-0">£<?= $thinkpad->getPrice() ?></p>
            <?php if ($thinkpad->getStock() > 0): ?>
               <p class="text-success">In stock</p>
               <a href="checkout.php?id=<?= $thinkpad->getId() ?>" class="btn btn-primary">Buy now</a>
            <?php else: ?>
               <p class="text-danger">Out of stock</p>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>

<?php


?>
