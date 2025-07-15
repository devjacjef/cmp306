<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/NewsController.php';

$controller = new NewsController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $title = isset($_POST['title']) ? $_POST['title'] : '';
   $body = isset($_POST['body']) ? $_POST['body'] : '';

   $news = $controller->createNews($title, $body);

   header('Location: /cmp306/coursework/block2/views/admin/');
   exit;
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
   $id = isset($_GET['id']) ? $_GET['id'] : '';

   $controller = new NewsController();

   $news = $controller->getNews($id);
}

?>

<div class="container">

   <form class="my-4 p-4 card container w-50 gap-2" action="" method="POST">
      <div class="form-group">
         <label for="title">Title</label>
         <input type="text" class="form-control" id="title" name="title" value="<?= $news->title ?>">
      </div>
      <div class="form-group">
         <label for="model">Body</label>
         <input type="text" class="form-control" id="body" name="body" value="<?= $news->body ?>">
      </div>
      <button type="submit" name="create" class="btn btn-primary">Create</button>
   </form>
</div>

<?php

require __DIR__ . '/../partials/footer.php';
?>
