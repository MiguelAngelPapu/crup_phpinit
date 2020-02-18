<?php
  include_once 'template/view/variables/datos_estaticos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <title>CRUP</title>
</head>
<body>
  <?php
    include_once 'template/view/FORMULARIO.php';
  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script data-main="template/script/js/logic/config" src="template/script/js/lib/require/require.js"></script>
  <script src="template/script/js/service/service_inicio.js"></script>
</body>
</html>