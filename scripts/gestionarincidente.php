<!DOCTYPE html>

<?php
  require '../scripts/funciones.php';

  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }
  conectar();
  $row = getConsultarIncidentes($_GET['no']);
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
          background-color: #333333;
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
            <li class="active"><a href="#">Gestionar</a></li>
            <li><a href="/intranet/panelUsuario.php">Regresar</a></li>
            <li><a href="/intranet/scripts/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
      <div class="starter-template">
        <h2><font color="#3399cc">Gestión de Incidente</h2></font>
          <h4>___________________________________</h4>
          <div class="formulario">
            <form action="../scripts/actualizar.php" method="POST">
              <div>
                <label for="ID">ID Incidente</label>
                <input type="text" name="ID" value="<?php echo $row['ID'] ?>">
                </br></br>
              </div>
              <div>
                <label for="fecha">Fecha incidente:</label>
                <input type="fecha" name="fecha" value="<?php echo $row['fecha'] ?>">
                </br></br>
              </div>
              <div>
                <label for="tipo" >Tipo</label>
                <select name="tipo" required>
                <option selected ><?php echo $row['tipo'] ?></option>
                <option >Comportamiento</option>
                <option >Condición</option>
                <option >Accidente</option>
                <option >Incidente</option>
                <option >Ocupacional</option>
                <option >Ambiental</option>
                </select>
                </br></br>
              </div>
              <div>
                <label for="incidente">No conformidad - Incidente:</label>
                <textarea type="text" name="incidente" required ><?php echo $row['incidente'] ?></textarea>
                </br></br>
              </div>
              <div>
                <label for="area">Área:</label>
                <input type="text" id="area" name="area" value="<?php echo $row['area'] ?>"><br>
                </br></br>
              </div>
              <div>
                <label for="reportado">Reportado por:</label>
                <input type="text" name="reportado" value="<?php echo $row['reportado'] ?>">
                </br></br>
              </div> 
              <div>
                <label for="causa">Causa Raíz:</label>
                <textarea type="text" name="causa" ><?php echo $row['causa'] ?></textarea>
                </br></br>
              </div>
              <div>
                <label for="gestion">Gestión:</label>
                <textarea type="text" name="gestion" ><?php echo $row['gestion'] ?></textarea>
                </br>             
              <div>
              <div>
                <label for="solucion">Responsable de la solución:</label>
                <input type="text" name="solucion" value="<?php echo $row['solucion'] ?>">
                </br></br>
              </div>
              <div>
                <label for="estado" >Tipo</label>
                <select name="estado" ><!-- required -->
                <option selected>En proceso</option>
                <option >Cerrado</option>
                <option >Abierto</option> 
                </select>                
              </div>
              <h4>___________________________________</h4>
            <input type="submit" class="button" value="Actualizar">
          </form>
        </div>
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>
