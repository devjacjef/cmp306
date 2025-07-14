<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/partials/login.php';
require __DIR__ . '/../controller/NewsController.php';

$news = new NewsController();

?>


<div class="container">
   <h1 class="text-center">Block 2</h1>
   <p class="text-center"><i>Put Map here</i></p>
</div>

<?php
require __DIR__ . '/partials/items.php';
?>

<div class="container">
   <h1 class="text-center">BBC News Feed</h1>
   <p class="text-center"><i>Put BBC News Feed here</i></p>
</div>

<?php

require __DIR__ . '/partials/footer.php';


?>
