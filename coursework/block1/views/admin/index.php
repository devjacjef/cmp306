<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/client.php';

// data for the table
$request = new RpcRequest("getAllThinkpads", "", "510572");
$client = new RpcClient($request, "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/jsonrpc/");
$response = $client->execute();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   // TODO: Add all the CUD operations!
   echo '<pre>';
   var_dump($_POST);
   echo '</pre>';
}

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
               <td>£<?= $thinkpads[$i]->getPrice() ?></td>
               <td><?= $thinkpads[$i]->getStock() ?></td>

               <td>
                  <!-- For edit, could have passed in just the Id and load the model on the other page-->
                  <a class="btn btn-primary" href="admin-edit.php?id=<?= $thinkpads[$i]->getId() ?>&model=<?= $thinkpads[$i]->getModel() ?>&description=<?= $thinkpads[$i]->getDescription() ?>&imageUrl=<?= $thinkpads[$i]->getImageUrl() ?>&price=<?= $thinkpads[$i]->getPrice() ?>&stock=<?= $thinkpads[$i]->getStock() ?>">Edit</a>
               </td>
               <td>
                  <form action="admin-delete.php" method="POST">
                     <button type="submit" class="btn btn-danger">Delete</button>
                     <input type="hidden" id="id" name="id" value="<?= $thinkpads[$i]->getId() ?>">
                  </form>
               </td>
            </tr>
         <?php $i++;
         endforeach; ?>
      </table>

      <a class="w-25 btn btn-primary" href="admin-create.php">Create</a>
   </div>
</div>
