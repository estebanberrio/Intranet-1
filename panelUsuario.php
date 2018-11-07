<?php
  require 'scripts/funciones.php';
  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }

  conectar();

  $respuesta = array();

  $categorias = getCategoriasPorUser();
  $nombre = getMostrarNombre();

  desconectar();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jumbotron-narrow.css">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Inicio</a></li>
            <!--<li role="presentation"><a href="scripts/cambiar-clave.php" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=300'); return false;">Cambiar Contraseña</a> -->
            <li role="presentation"><a href="scripts/cambiar-clave.php">Cambiar Contraseña</a>
            <li role="presentation"><a href="scripts/cerrar-sesion.php">Cerrar sesión</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Litoempaques</h3>
      </div>


      <?php foreach( $nombre as $fila ):
            $nombre1=$fila[1];
      endforeach ?>

      <div class="jumbotron">
        <h2>Bienvenido(a),<h2>
        <h1><font color="#3399cc"> <?= $nombre1 ?> </h1></font>
        <p class="lead">Desde esta sección podrás acceder a diversas categorías de nuestra Intranet.</p>
      </div>

    	<div class="row marketing">
          <?php foreach( $categorias as $fila ): ?>
  		    <div class="col-lg-6">
            <h4><a href="categorias/<?= $fila[2] ?>" target="_blank" onClick="window.open(this.href, this.target); return false;"><?= $fila[0] ?></a></h4>
            <p><?= $fila[1] ?></p>
          </div>
          <?php endforeach ?>
  		</div>

      <div class="row marketing">
	       <footer class="footer">
	          <p>&copy; Litoempaques 2018</p>
	       </footer>
      </div> <!-- container -->


  </body>
</html>
