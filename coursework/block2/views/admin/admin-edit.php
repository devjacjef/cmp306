<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/NewsController.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $id = isset($_POST['id']) ? $_POST['id'] : '';
   $title = isset($_POST['title']) ? $_POST['title'] : '';
   $body = isset($_POST['body']) ? $_POST['body'] : '';
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
   $id = isset($_GET['id']) ? $_GET['id'] : '';

   $controller = new NewsController();

   $news = $controller->getNews($id);

   var_dump($news);
}
