<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Site Metas -->
  <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Site CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
  <!-- Start Main Top -->
  <div class="main-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


          <div class="our-link">
            <ul>
              <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
              <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
              <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="text-slid-box">
            <div id="offer-box" class="carouselTicker">
              <ul class="offer-box">
                <li>
                  <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                </li>
                <li>
                  <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                </li>
                <li>
                  <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                </li>
                <li>
                  <i class="fab fa-opencart"></i> Off 50%! Shop Now
                </li>
                <li>
                  <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                </li>
                <li>
                  <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                </li>
                <li>
                  <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                </li>
                <li>
                  <i class="fab fa-opencart"></i> Off 50%! Shop Now
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
      <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>








            <?php if (!isset($_SESSION["tipo"])) { ?>
              <li class="nav-item"><a class="nav-link" href="registrar_cliente.php">Registrarse</a></li>
              <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>

            <?php } ?>
            <?php if (isset($_SESSION["tipo"])) {
              if ($_SESSION["tipo"] == "admin") {
            ?>
                <li class="nav-item"><a class="nav-link" href="producto.php">Productos</a></li>
                <li class="dropdown">
                  <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Proveedores</a>
                  <ul class="dropdown-menu">
                    <li><a href="CrearProveedor.php">Crear</a></li>
                    <li><a href="ListadoProveedores.php">Listado</a></li>
                  </ul>

                </li>
                <li class="dropdown">
                  <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Facturas</a>
                  <ul class="dropdown-menu">
                    <li><a href="ListadoFacturas.php">Listado</a></li>
                   
                  </ul>

                </li>
                <li class="nav-item"><a class="nav-link" href="registrar_admins.php">Registrar Administradores</a></li>

              <?php
              } else {
              ?>

                <li class="dropdown">
                  <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Comprar</a>
                  <ul class="dropdown-menu">
                    <li><a href="compras.php">compras</a></li>
                    <li><a href="ver_carro.php">Ver carrito</a></li>
                  </ul>

                </li>
              <?php

              }

              ?>
              <li class="nav-item"><a class="nav-link" href="login.php?log=2">logout</a></li>
              <li class="nav-item"><?php echo "Bienvenido " . $_SESSION["nick"];     ?></li>

            <?php } ?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
          <ul>
            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
            <li class="side-menu">
              <a href="#">
                <i class="fa fa-shopping-bag"></i>
                <span class="badge">3</span>
                <p>My Cart</p>
              </a>
            </li>
          </ul>
        </div>
        <!-- End Atribute Navigation -->
      </div>
      <!-- Start Side Menu -->
      <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <li class="cart-box">
          <ul class="cart-list">
            <li>
              <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
              <h6><a href="#">Delica omtantur </a></h6>
              <p>1x - <span class="price">$80.00</span></p>
            </li>
            <li>
              <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
              <h6><a href="#">Omnes ocurreret</a></h6>
              <p>1x - <span class="price">$60.00</span></p>
            </li>
            <li>
              <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
              <h6><a href="#">Agam facilisis</a></h6>
              <p>1x - <span class="price">$40.00</span></p>
            </li>
            <li class="total">
              <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
              <span class="float-right"><strong>Total</strong>: $180.00</span>
            </li>
          </ul>
        </li>
      </div>
      <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
  </header>