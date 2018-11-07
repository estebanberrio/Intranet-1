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
    <title>Incidente Reportad</title>
     <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <style>
      table, th, td 
      {
        border: 1px solid black;
        border-collapse: collapse;
        table-layout: center;
      }
      
      th, td 
      {
        padding: 5px;
        text-align: center;    
      }

      .button
        {
          background-color: #333333;
          border: none;
          color: white;
          padding: 15px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          margin: 1px 1px;
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
            <li class="active"><a href="#">Incidentes</a></li>
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <?php   

    $ID = GetContarID();
    $ID++;
    $aporta = '0 accidentes- SG SST';
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];
    $incidente = $_POST['incidente'];
    $area = $_POST['area'];    
    $reportado = $_POST['reportado'];
    $causa = $_POST['causa'];
    $gestion = $_POST['gestion'];
    $solucion = $_POST['solucion'];
    $estado = $_POST['estado'];  

    /*fecha del día del reporte*/
    $now = date('Y-m-d');

    /*no permite fecha futuro convierte a fecha actual*/
    if($fecha > $now)
    {
      $fecha = $now;
    }

    if(empty($causa))
    {
      $causa = 'Pendiente';
    }

    if(empty($gestion))
    {
      $gestion = 'Pendiente';
    }

    if(empty($solucion))
    {
      $solucion = 'Pendiente';
    }

    
    GetvalidarIncidente("$ID", "$fecha", "$tipo", "$incidente", "$area", "$reportado", "$causa", "$gestion", "$solucion", "$estado","$aporta"); 

    echo '<script>alert (" Datos Registrados con Éxito");</script>';
    
  ?>

  <div class="container">
    <div class="starter-template">
      <div class="formulario">
        <h1><font color="#3399cc">Incidente Registrado</h1></font></br>


        
        <div style="text-align:center;">
          <table border="1" style="margin: 0 auto;"> 
            <col style="width:5%;" />
            <col style="width:15%;" />
         
            <thead>
              <tr>
                <th scope="col" bgcolor="#333333"><font color="white">CAMPO</th></font>
                <th scope="col" bgcolor="#333333"><font color="white">INFORMACIÓN</th></font>
              </tr>
            </thead>
       
            <tbody>
              <tr>
                <th scope="row">ID</th><td><?php echo $ID; ?></td>
              </tr>
              <tr>
                <th scope="row">Fecha</th><td><?php echo $fecha; ?></td>
              </tr>
              <tr>
                <th scope="row">Tipo</th><td><?php echo $tipo; ?></td>
              </tr>
              <tr>
                <th scope="row">Incidente</th><td><?php echo $incidente; ?></td>
              </tr>
              <tr>
                <th scope="row">Área</th><td><?php echo $area; ?></td>
              </tr>
              <tr>
                <th scope="row">Reporta</th><td><?php echo $reportado; ?></td>
              </tr>
              <tr>
                <th scope="row">Causa_Raíz</th><td><?php echo $causa; ?></td>
              </tr>
              <tr>
                <th scope="row">Gestión</th><td><?php echo $gestion; ?></td>
              </tr>
              <tr>
                <th scope="row">Solución</th><td><?php echo $solucion; ?></td>
              </tr>
              <tr>
                <th scope="row">Estado</th><td><?php echo $estado; ?></td>
              </tr>
              <tr>
                <th scope="row">Aporta</th><td><?php echo $aporta; ?></td>
              </tr>
            </tbody>
          </table>
        </div></br></br>

        <a href="/intranet/categorias/incidentes.php"><input type="button" class="button" value="Nuevo Registro"></a>

      </div>  
    </div>
  </div>        


  </head>
</html>