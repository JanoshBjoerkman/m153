<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CDN (content delivery network) for bootstrap css  -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Optional themes  -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">


    <link rel="stylesheet" type="text/css" href="css/my.css" />

    <title>Playground Modul 183</title>
  </head>

  <!-- start body, corresponding end tag in footer.php -->
  <body data-navtag="<?php echo $data->currentView?>">
  
    <!-- include navigation -->
    <?php
      require_once(VIEW_PATH . "/navigation.php");
    ?>

    <!-- start tag of main bootstrap container, corresponding end tag in footer.php -->
    <div class="container">   

      <!-- include potential alert box -->
      <?php
        if ($data->showAlert) {
          require_once(VIEW_PATH . "/alertbox.php");
        }
      ?>
  
