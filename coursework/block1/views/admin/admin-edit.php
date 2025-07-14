<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/client.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = isset($_POST['id']) ? $_POST['id'] : '';
   $model = isset($_POST['model']) ? $_POST['model'] : '';
   $description = isset($_POST['description']) ? $_POST['description'] : '';
   $imageUrl = isset($_POST['imageUrl']) ? $_POST['imageUrl'] : '';
   $price = isset($_POST['price']) ? $_POST['price'] : '';
   $stock = isset($_POST['stock']) ? $_POST['stock'] : '';

   $thinkpad = new Thinkpad($id, $model, $description, $imageUrl, $price, $stock);

   $request = new RpcRequest("updateThinkpad", $thinkpad, "510572");

      $client = new RpcClient($request, "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/jsonrpc/");

   $client->execute();

   if (isset($_POST['save'])) {
      echo 'The model has been updated.';
   }

   if (isset($_POST['save-exit'])) {
      header('Location: /~2207061/cmp306/coursework/block1/views/admin');
      exit;
   }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   $id = isset($_GET['id']) ? $_GET['id'] : '';
   $model = isset($_GET['model']) ? $_GET['model'] : '';
   $description = isset($_GET['description']) ? $_GET['description'] : '';
   $imageUrl = isset($_GET['imageUrl']) ? $_GET['imageUrl'] : '';
   $price = isset($_GET['price']) ? $_GET['price'] : '';
   $stock = isset($_GET['stock']) ? $_GET['stock'] : '';
}
?>
<div class="container">


   <form class="my-4 p-4 card container w-50 gap-2" action="" method="POST">
      <div class="form-group">
         <label for="id">ID</label>
         <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>">
      </div>
      <div class="form-group">
         <label for="model">Model</label>
         <input type="text" class="form-control" id="model" name="model" value="<?= $model ?>">
      </div>
      <div class="form-group">
         <label for="description">Description</label>
         <input type="text" class="form-control" id="description" name="description" value="<?= $description ?>">
      </div>
      <!--If I can handle files properly I will but for the time  being just an image URL will work-->
      <div class="form-group">
         <label for="imageUrl">Image Url</label>
         <input type="text" class="form-control" id="imageUrl" name="imageUrl" value="<?= $imageUrl ?>">
      </div>
      <div class="form-group">
         <label for="price">Price</label>
         <input type="text" class="form-control" id="price" name="price" value="<?= $price ?>">
      </div>
      <div class="form-group">
         <label for="stock">Stock</label>
         <input type="text" class="form-control" id="stock" name="stock" value="<?= $stock ?>">
      </div>
      <button type="submit" name="save" class="btn btn-primary">Save</button>
      <button type="submit" name="save-exit" class="btn btn-primary">Save & Exit</button>
   </form>
</div>

<?php

require __DIR__ . '/../partials/footer.php';
?>
