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
    <title>Reporte de Incidentes</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <style>
      .button
        {
          background-color: #3399cc;
          border: none;
          color: white;
          padding: 5px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          margin: 4px 2px;
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
            <li class="active"><a href="#">Certificados</a></li>
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
      <div class="starter-template">
        <h2><font color="#3399cc">Generar Certificados</h2></font>
           <table width="100%" border="1" align="center">
          <tr align="center" bgcolor="#eee" class="texto">
            <td bgcolor="#333333"><font color="white"><b>Certificado</b></td>
            <td bgcolor="#333333"><font color="white"><b>Opción</b></td>

          </tr>


            <tr>
              <td align="center"><b>Certificación Laboral</b></td>

              <?php
              echo "<td bgcolor='#ffffff' ><a href='../scripts/certificado_laboral.php'><button type='button' class='button'>Generar</button></a></td>";?>              
            </tr>
        </table>           

      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


  <?php
    desconectar();
  ?>
  </body>
</html>
