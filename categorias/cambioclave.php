<!DOCTYPE html>
<html>
<head>

  <?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }
  conectar();

  $respuesta = array();
  $oldpass = $_POST['oldpass'];
  $respuesta = getValidarClave();

  if($oldpass == $respuesta[0])
  {
      getCambiarClave($_POST['password']);
      //inicio javascrip para mensajes de dialogo
      ?>
      <script language="javascript">
          alert("La clave ha sido cambiada exitosamente!");
      </script>
      <?php
      echo "<script language='Javascript'>\n;
      document.location = '../scripts/cerrar-sesion.php'; </script>";
  }
  else{
          // inicio javascrip para mensajes de dialogo

          ?>
          <script language="javascript">
          alert("La clave anterior esta incorrecta!");
          </script>
          <?php
          echo "<script language='Javascript'>\n;
          document.location = '../scripts/cambiar-clave.php'; </script>";

        }
          ?>
    </head>
</html>
