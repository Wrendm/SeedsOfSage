<?php require_once 'admin/config/constants.php'?>
<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QTDTQLGNLV"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-QTDTQLGNLV');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seeds of Sage</title>
    <link rel="stylesheet" href="seedsofsage.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column h-100">
    <header class="d-flex flex-wrap justify-content-center p-3 align-items-center" style="background-color: #587059;">
      <a href="<?php echo HOMEPAGE; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img src="images\placeholder-logo.png" height="200px" style="max-width:100%;">
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo HOMEPAGE; ?>" class="nav-link">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu" style="margin-left:30px !important;">
            <li><a class="dropdown-item" href="<?php echo HOMEPAGE; ?>about">About Me</a></li>
            <li><a class="dropdown-item" href="<?php echo HOMEPAGE; ?>aboutapproach">My Approach</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="<?php echo HOMEPAGE; ?>services" class="nav-link">Offerings</a></li>
        <li class="nav-item"><a href="<?php echo HOMEPAGE; ?>blog" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="<?php echo HOMEPAGE; ?>contactform" class="nav-link active">Contact</a></li>
      </ul>
    </header>