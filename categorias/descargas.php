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
    <title>Descargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jumbotron-narrow.css">


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
          <a class="navbar-brand" href="#">LitoEmpaques</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Descargas</a></li>
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <h1 align="center"><font color="#3399cc">Colilla de pago</h1></font>
      <table width="100%" border="1" align="center">
        <tr align="center" bgcolor="#eee" class="texto">
          <td bgcolor="#e0e0e0" ><b>Periodo</b></td>
          <td bgcolor="#e0e0e0" ><b>Opción 1</b></td>
          <td bgcolor="#e0e0e0" ><b>Opción 2</b></td>
        </tr>
<!--
        <div>
          <form action=" " method="POST">
           <label> Ingrese Cédula a buscar:  </label>
            <input type="text" name="texto">
            <button type='submit'> Buscar </button>
            <br></br>
           </form>
        </div>->
-->


      <?php
        /*$cedula = isset($_SESSION['usuario']) ? $_SESSION['usuario']: '';
        $mostrararchivos = getMostrarArchivos($cedula);
        $i = 1;

        foreach($mostrararchivos as $mostrararchivo):?>
        <tr>

          <td align="center"><?= $mostrararchivo[2] ?></td>
          <td align="center"><a href="../documentos/<?= $mostrararchivo[2] ?>/<?= $mostrararchivo[1] ?>" target='descargar.php' onclick=\"window.open" viewport> Visualizar </a></td>
          <td align="center"><a href="../documentos/<?= $mostrararchivo[2] ?>/<?= $mostrararchivo[1] ?>" download> Descargar </a></td>
        </tr> <?php
        endforeach ?>*/

        $objregistros=getMostrarColillas();

       while($registro=$objregistros->fetch_object())
       {
       ?>
           <tr>
           <td align="center"><?php echo $registro->mes;?></td>
           <td align="center"><a href="../documentos/<?php echo $registro->mes;?>/<?= $registro->archivo ?>" target='descargar.php' onclick=\"window.open" viewport> Visualizar </a></td>
           <td align="center"><a href="../documentos/<?php echo $registro->mes;?>/<?= $registro->archivo ?>" download> Descargar </a></td>

           </tr>

       <?php
       }
       desconectar();
       ?>
  </div> <!-- container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  </body>
</html>
