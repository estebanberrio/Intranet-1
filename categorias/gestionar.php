<!DOCTYPE html>

<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }
  conectar();
  $objincidente=getMostrarIncidentes();
?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Incidentes</title>
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <style>
    .button
      {
        background-color: #3399cc;
        border: white;
        color: white;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
      }

      .button2
      {
        background-color: #333333;
        border: white;
        color: white;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
      }
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
            <li class="active"><a href="#">Gestionar</a></li>
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
      <div class="starter-template">
        <h1><font color="#3399cc">Gestionar Incidentes</h1></font>

        <table width="100%" border="1" align="center">
          <tr align="center" bgcolor="#eee" class="texto">
            <td bgcolor="#333333"><font color="white"><b>ID</b></td>
            <td bgcolor="#333333"><font color="white"><b>Fecha</b></td>
            <td bgcolor="#333333"><font color="white"><b>Incidente</b></td>
            <td bgcolor="#333333"><font color="white"><b>Área</b></td>
            <td bgcolor="#333333"><font color="white"><b>Causa</b></td>
            <td bgcolor="#333333"><font color="white"><b>Responsable</b></td>
            <td bgcolor="#333333"><font color="white"><b>Estado</b></td>
            <td bgcolor="#333333"><font color="white"><b>Acciones</b></td>  
          </tr>

          <?php
          while($incidente=$objincidente->fetch_object())
          {?>
            <tr>
              <td align="center"><?php echo $incidente->ID; ?></td>
              <td align="center"><?php echo $incidente->fecha; ?></td>
              <td align="center"><?php echo $incidente->incidente; ?></td>
              <td align="center"><?php echo $incidente->area; ?></td>
              <td align="center"><?php echo $incidente->causa; ?></td>
              <td align="center"><?php echo $incidente->solucion; ?></td>         
          
              <?php
              switch ($incidente->estado)
              {
                case 'Abierto':?>
                    <td align="center" bgcolor="#DF0101"><?php echo $incidente->estado; ?></td><?php
                    break;
                case 'En proceso':?>
                    <td align="center" bgcolor="#FFFF00"><?php echo $incidente->estado; ?></td><?php
                    break;
                case 'Cerrado':?>
                    <td align="center" bgcolor="#04B404"><?php echo $incidente->estado; ?></td><?php
                    break;
              }

              echo "<td bgcolor='#ffffff' ><a href='../scripts/gestionarincidente.php?no=".$incidente->ID."'><button type='button' class='button'>Gestionar</button></a></td>";?>              
            </tr><?php
          }?>
        </table></br><?php 
          echo "<td bgcolor='#ffffff' ><a href='../scripts/exportar.php'><button type='button2' class='button2'>Exportar</button></a></td>";?> 
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>
