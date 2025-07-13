<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/NewsController.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $title = isset($_POST['title']) ? $_POST['title'] : '';
   $title = isset($_POST['body']) ? $_POST['body'] : '';
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
   $id = isset($_GET['id']) ? $_GET['id'] : '';

   $controller = new NewsController();

   $news = $controller->getNews($id);
}
