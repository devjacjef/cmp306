<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/client.php';

$request = new RpcRequest("getAllThinkpads", "", "510572");
$client = new RpcClient($request, "http://127.0.0.1/cmp306/coursework/jsonrpc/");
$response = $client->execute();

?>
<div class="container">
   <div class="row w-100 justify-content-center align-items-center">
      <table class="table table-striped">
         <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Description</th>
            <th>Image Url</th>
            <th>Price</th>
            <th>Stock</th>
            <th></th>
         </tr>
         <?php
         $thinkpads = [];
         $i = 0;
         foreach ($response as $r):
            $thinkpads[] = Thinkpad::fromJson($r->resultJson());
         ?>
            <tr>
               <td><?= $thinkpads[$i]->getId() ?></td>
               <td><?= $thinkpads[$i]->getModel() ?></td>
               <td><?= $thinkpads[$i]->getDescription() ?></td>
               <td><?= $thinkpads[$i]->getImageUrl() ?></td>
               <td><?= $thinkpads[$i]->getPrice() ?></td>
               <td><?= $thinkpads[$i]->getStock() ?></td>

               <td><button class="btn btn-primary">Edit</button>
                  <button class="btn btn-danger">Delete</button>
               </td>
            </tr>
         <?php $i++;
         endforeach; ?>
      </table>
      <button class="w-25 btn-secondary">Create</button>
   </div>
</div>
