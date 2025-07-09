<?php

require __DIR__ . '/../../controller/account.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   if (isset($_POST['logout'])) {
      Account::logout();
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;;
   }

   if (isset($_POST['signup'])) {
      header('Location: ' . 'account/signup.php');
   }

   if (isset($_POST['login'])) {
      if (isset($_POST['username']) && isset($_POST['password'])) {
         $username = htmlspecialchars($_POST['username']);
         $password = htmlspecialchars($_POST['password']);

         Account::login($username, $password);
      } else {
         echo 'Username and password are required fields.';
      }
   }
}
?>

<?php if (empty($_SESSION['user'])):
?>
   <form class="my-4 p-4 card container w-25 gap-2" action="" method="POST">
      <div class="form-group">
         <label for="username">Username</label>
         <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
      </div>
      <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
      <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
   </form>
<?php
else:
?>
   <div class="my-4 p-4 card container w-25 gap-2">
      <div class="">
         <div>
            <p>Welcome, <?= $_SESSION['user']['username'] ?></p>
         </div>
         <div class="btn-group gap-2">
            <?php if ($_SESSION['user']['username'] === 'admin1') ?>
            <a href="/cmp306/coursework/block1/views/admin/" class="btn btn-primary">Admin Panel</a>
            <?endif;?>
            <form action="" method="POST">
               <input type="submit" name="logout" value="Log out" class="btn btn-primary">
            </form>
         </div>
      </div>
   </div>
<?php endif
?>
