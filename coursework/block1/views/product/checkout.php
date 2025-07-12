<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/client.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'):
   $request = new RpcRequest("getThinkpadById", $_GET['id'], "510572");

   $client = new RpcClient($request, "http://localhost/cmp306/coursework/jsonrpc/");

   $response = $client->execute();

   $thinkpad = Thinkpad::fromJson($response->resultJson());

   $total = $thinkpad->getPrice();
?>
   <div class="my-4 p-4 card container w-50 gap-2">
      <form class="form" method="POST">
         <div class="form-group">
            <label for="card">Card Number</label>
            <input type="text" class="form-control" id="card" name="card" placeholder="1616161616161616">
            <p>Total Amount: £<?= $total ?></p>
            <!--Would display a list of items but that is a lot of effort-->
            <p>x1 <?= $thinkpad->getModel() ?></p>
            <input type="hidden" id="total" name="total" value="<?= $total ?>">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <button type="submit" name="purchase" class="btn btn-primary">Purchase</button>
         </div>
      </form>
   </div>
   <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'):
   require __DIR__ . '/../../controller/payment.php';

   $payment = new Payment($_POST['total'], $_POST['card']);

   $response = $payment->makePayment();

   $status = json_decode($response);

   $request = new RpcRequest("getThinkpadById", $_POST['id'], "510572");
   $client = new RpcClient($request, "http://localhost/cmp306/coursework/jsonrpc/");
   $response = $client->execute();

   $thinkpad = Thinkpad::fromJson($response->resultJson());

   if ($status->status == 1) {
      $request = new RpcRequest("updateThinkpad", $thinkpad, "510572");
      $client = new RpcClient($request, "http://localhost/cmp306/coursework/jsonrpc/");
      $client->execute();
   ?>
      <p>Your payment was successful.</p>
      <p>Thank you for shopping with ThinkStudent.</p>
      <a href="/cmp306/coursework/block1/views/">Continue shopping</a>
   <?php } ?>

<?php endif ?>
