<?php require_once 'admin/config/constants.php';?>
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
    <link href="seedsofsage.css?<?php echo time(); ?>" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large" style="background-color: #587059;">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo HOMEPAGE; ?>"> 
            <img src="images\placeholder-logo.png" class="header-img">
          </a>
          <button class="navbar-toggler align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" style="background-color: #587059;" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo HOMEPAGE; ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    About
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo HOMEPAGE; ?>about">About Me</a></li>
                    <li><a class="dropdown-item" href="<?php echo HOMEPAGE; ?>aboutapproach">My Approach</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="<?php echo HOMEPAGE; ?>services" class="nav-link">Offerings</a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo HOMEPAGE; ?>blog" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo HOMEPAGE; ?>contactform" class="nav-link active">Contact</a></li>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>