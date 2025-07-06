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
      global $conn;
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      $rows = array();
      while ($r = mysqli_fetch_assoc($result)) {
         $rows[] = $r;
      }

      return $rows;
   }

   public static function login(string $username, string $password)
   {
      $users = self::getAllUsers();
      $hash = hash('sha256', $password);

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
   }

   public static function logout()
   {
      session_destroy();
   }
}
