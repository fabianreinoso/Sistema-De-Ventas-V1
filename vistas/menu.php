<?php require_once "dependencias.php" ?>
<!DOCTYPE html>
<html>

<head>
  <title> </title>
</head>

<body>
  <div>
    <nav class="navbar fixed-top  navbar-expand-md navbar-dark bg-info"  data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header" >
          <a class="navbar-brand" href="inicio.php"><img class=" img-responsive logo img-thumbnail" src="../img/sistemaventas.JPG" alt="" style=" position:absolute" width="150px" height="150px"></a>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio.php"> <i class="bi bi-house-door-fill"></i> Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-card-list"></i>
              Administrar Articulos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="categorias.php">Categorias</a></li>
              <li><a class="dropdown-item" href="articulos.php">Articulos</a></li>
            </ul>
          </li>
          <?php
          if ($_SESSION['usuario'] == "admin") :
          ?>
            <li><a class="nav-link  text-light" href="usuarios.php"> <i class="bi bi-person-fill"></i> Administrar usuarios</a>
            </li>
          <?php
          endif;
          ?>

          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="clientes.php"><i class="bi bi-people-fill"></i>
              Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="ventas.php"> <i class="bi bi-currency-dollar"></i>Vender Articulo</a>
          </li>


        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a href="#" class="navbar-brand dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person-fill"></i>
              Usuario: <?php echo $_SESSION['usuario']; ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a style="color: red" class="dropdown-item" href="../procesos/salir.php"><i class="bi bi-power"></i> Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
  </div>
</body>

</html>
<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    } else {
      $('.logo').height(100);
    }
  });
</script>