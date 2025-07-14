<?php

require __DIR__ . '/../../controller/account.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
      Account::createAccount($_POST['username'], $_POST['password'], $_POST['confirm_password']);
      Account::login($_POST['username'], $_POST['password']);
   } else {
      echo 'User or Password was wrong.';
      if ($_POST['password'] != $_POST['confirm_password']) {
         echo ' Passwords did not match.';
      }
   }
}

?>

<form class="my-4 p-4 card container w-25 gap-2" action="" method="POST">
   <div class="form-group">
      <label for="exampleInputEmail1">Choose your Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter Username">
   </div>
   <div class="form-group">
      <label for="exampleInputPassword1">Create a Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
   </div>
   <div class="form-group">
      <label for="exampleInputPassword1">Confirm your Password</label>
      <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="confirm_password" placeholder="Password">
   </div>
   <button type="submit" class="btn btn-primary">Create Account</button>
</form>
