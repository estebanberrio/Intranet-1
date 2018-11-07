<!DOCTYPE html>
<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }
  conectar();
?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambiar Clave</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <style>
    body { padding-top: 50px; }
    .starter-template { padding: 40px 15px; text-align: center; }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Litoempaques</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li class="active"><a href="#">Cambiar Clave</a></li>
              <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

          <form ACTION="../categorias/cambioclave.php" METHOD="post">
            <div class="container"> <br></br>
              <h1 align="center"><font color="#3399cc">Cambio de Contraseña</h1></font><br></br>
              <h4 align="center">Esta acción cambiará su contraseña de inicio de sesión en la intranet, <br /> por lo cual al momento de generarse el cambio será deslogueado de la sesión actual, <br /> y debera ingresar con su nueva clave, le pedimos utilizar una clave que le sea fácil recordar.</h4><br></br>
              <h4 align="center">Ingrese su clave actual <br></br>
              <INPUT align="center" TYPE="password" NAME="oldpass" SIZE=45 MAXLENGTH=45></h4>
              <h4 align="center">Ingrese su nueva clave <br></br>
              <INPUT align="center" TYPE="password" NAME="password" SIZE=45 MAXLENGTH=45> <br></br>
              <INPUT align="center" TYPE="submit" CLASS="boton" VALUE="Registrar"></h4>
            </div><!-- /.container -->
          </form>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>
