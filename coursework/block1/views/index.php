<?php

require __DIR__ . '/partials/header.php';

include __DIR__ . '/../model/thinkpad.php';

/**
* @TODO Remove this code in the future as this is just a demo to show the model works.
*/
$tp = new Thinkpad(
    1,
    "Thinkpad T440p",
    "Military Grade",
    "image01"
);

$tp->printModel();

echo $tp->toJson();
?>

<p>Hello, there!</p>

<?php

require __DIR__ . '/partials/footer.php';

?>
