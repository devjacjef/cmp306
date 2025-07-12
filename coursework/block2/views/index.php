<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/partials/login.php';

require __DIR__ . '/../controller/NewsController.php';

$news = new NewsController();

$something = $news->getNews(1);

var_dump($something);
// TODO: DO SOMETHING WITH THIS DATA AND THEN DO IT FOR THE REST AND QUICKLY WRAP THIS BLOCK 2 UP
?>

<p>Block 2</p>

<?php

require __DIR__ . '/partials/footer.php';

?>
