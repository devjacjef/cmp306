<?php

require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../../controller/NewsController.php';

$controller = new NewsController();

$items = $controller->getAllNews();

?>

<div class="container">
   <div class="row w-100 justify-content-center align-items-center">
      <table class="table table-striped">
         <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th></th>
            <th></th>
         </tr>

         <?php
         $news = [];
         $i = 0;
         foreach ($items->news as $item):
         ?>
            <tr>
               <td><?= $item->id ?></td>
               <td><?= $item->title ?></td>
               <td><?= $item->body ?></td>
               <td>
                  <a class="btn btn-primary" href="admin-edit.php?id=<?= $item->id ?>">Edit</a>
               </td>
               <td>
                  <form action="admin-delete.php" method="POST">
                     <button type="submit" class="btn btn-danger">Delete</button>
                     <input type="hidden" id="id" name="id" value="<?= $item->id ?>">
                  </form>
               </td>
            </tr>
         <?php
         endforeach;
         ?>
      </table>

      <a class="w-25 btn btn-primary" href="admin-create.php">Create</a>
   </div>
</div>

<?php
require __DIR__ . '/../partials/footer.php';
?>
