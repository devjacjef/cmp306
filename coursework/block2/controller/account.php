<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connection.php';
require __DIR__ . '/../model/user.php';

$conn = getDatabaseConnection();

// TODO Implement this class
class Account
{

   private static function getAllUsers()
   {
      // Ideally could just get username and id and then check password later with another call to be more secure...
      global $conn;
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      $rows = array();
      while ($r = mysqli_fetch_assoc($result)) {
         $rows[] = $r;
      }

      return $rows;
   }

   public static function createAccount(string $username, string $password, string $confirmPassword)
   {
      global $conn;

      $stmt = $conn->prepare("insert into users (Username, Password) values (?, ?)");

      if (!$stmt) {
         error_log("Prepare failed: " . $conn->error);
         return false;
      }

      // FIXME: Just hacky for a quick test...
      $Username = $username;
      if ($password == $confirmPassword) {
         $Password = hash('sha256', $password);
      }

      $stmt->bind_param("ss", $Username, $Password);

      $result = $stmt->execute();

      if (!$result) {
         error_log("Execute failed: " . $stmt->error);
      }

      $stmt->close();

      return $result;
   }

   public static function login(string $username, string $password)
   {
      $users = self::getAllUsers();
      $hash = hash('sha256', $password);

      // Ideally write a query to find the user login by using username and password hash against db
      foreach ($users as $user) {
         if ($username == $user['Username']) {
            if ($hash == $user['Password']) {
               $u = json_encode($user);
               $_SESSION['user'] = [
                  'id' => $user['ID'],
                  'username' => $user['Username']
               ];
               break;
            }
         }
      }

      header("Location: /~2207061/cmp306/coursework/block1/views/index.php");
      exit;
   }

   public static function logout()
   {
      session_destroy();
   }
}
