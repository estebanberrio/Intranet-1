<!DOCTYPE html>
<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion())
  {
  	header('Location: index.html');
  }
  conectar();
  $vector_row = getExportar();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exportar Incidentes</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
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
            <li class="active"><a href="#">Exportar</a></li>
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
      <div class="starter-template">
        <div class="formulario"></br></br>
          <!-- <form action="../scripts/exportar_data.php" method="POST"> -->
            <form action="../scripts/pruebas_excel.php" method="POST">
            <button type="submit" id="exportar_data" name='exportar_data' value="exportar_data" class="btn btn-info">Exportar a Excel</button>
          </form></br>
          <table id="tabla" class="table table-striped table-bordered" style="font-size:12px">
            <tr>
              <td bgcolor="#333333"><font color="white"><b>id</b></td>
              <td bgcolor="#333333"><font color="white"><b>Fecha</b></td>              
              <td bgcolor="#333333"><font color="white"><b>Tipo</b></td>
              <td bgcolor="#333333"><font color="white"><b>Incidente</b></td>
              <td bgcolor="#333333"><font color="white"><b>Área</b></td>
              <td bgcolor="#333333"><font color="white"><b>Reportado</b></td>
              <td bgcolor="#333333"><font color="white"><b>Causa</b></td>
              <td bgcolor="#333333"><font color="white"><b>Gestión</b></td>
              <td bgcolor="#333333"><font color="white"><b>Solución</b></td>
              <td bgcolor="#333333"><font color="white"><b>Estado</b></td>
              <td bgcolor="#333333"><font color="white"><b>Aporta</b></td>
            </tr>
            <tbody>
              <?php foreach($vector_row as $row) { ?>
              <tr>                
                <td><?php echo $row ['ID']; ?></td>
                <td><?php echo $row ['fecha']; ?></td>
                <td><?php echo $row ['tipo']; ?></td>
                <td><?php echo $row ['incidente']; ?></td>
                <td><?php echo $row ['area']; ?></td>
                <td><?php echo $row ['reportado']; ?></td>
                <td><?php echo $row ['causa']; ?></td>
                <td><?php echo $row ['gestion']; ?></td>
                <td><?php echo $row ['solucion']; ?></td>
                <td><?php echo $row ['estado']; ?></td>
                <td><?php echo $row ['aporta']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>        
      </div>
    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>