<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Block 2</title>
</head>

<body class="d-flex flex-column h-100">
   <header>
      <div class="card text-center">
         <div>
            <h1 class="card-title">Jack's Glasgow News</h1>
            <h2 class="card-title">Jack Jefferson</h2>
         </div>
      </div>
   </header>
   <main>
