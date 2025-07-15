<?php
require __DIR__ . '/../../controller/NewsController.php';

$controller = new NewsController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   if (isset($_POST['id'])) {
      $controller->deleteNews($_POST['id']);
   }

   header('Location: /cmp306/coursework/block2/views/admin/');
   exit;
}
