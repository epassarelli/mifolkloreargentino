<!DOCTYPE html>
<html>

<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="google-site-verification" content="b4e3xgPWj0Fwb1N4ggo93LYs33S1uZ7EAUnyEaIGP90" />
  <meta name="author" content="WebPass" />
  <meta name="description" content="<?php if (isset($description)) echo $description; ?>">
  <meta name="keywords" content="<?php if (isset($keywords)) echo $keywords; ?>">

  <title>
    <?php
    if (isset($title)) {
      $title = $title; //'Mi panel';
    } else {
      $title = "MFA";
      //echo $title;
    }

    if (strlen($title) < 70) {
      $titulo = $title . ' | Folklore Argentino';
      echo $titulo;
    };
    ?>

  </title>

  <?php
  if (($this->uri->segment(1) !== 'admin') and ($this->uri->segment(1) !== 'wpanel')) {
    $frontend = true;
  } else {
    $frontend = false;
  }
  ?>

  <?php if (($_SERVER['SERVER_NAME'] != 'localhost') and ($frontend)) {
    $this->load->view("adsense/adsense_head_view");
    $this->load->view("google_analitycs_view");
  } ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet"> -->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->