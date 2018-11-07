<?php
	$conexion = null;

	function conectar()
	{
		global $conexion;
		// $conexion = mysqli_connect('localhost', 'root', '', 'intranet');
		$conexion = mysqli_connect('localhost', 'root', '', 'intranet');
		mysqli_set_charset($conexion, 'utf8');
	}

  // permite mostrar el nombre de usuario de la sesion iniciada
	function getMostrarNombre()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM datospersonales where usuario='".$_SESSION['usuario']."'");
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		{
				$respuestas_array[] = $fila;
		}
		return $respuestas_array;
	}

	// obtener datos del certificado laboral por usuario
	function getCertificadoLaboral()
	{
		global $conexion;
	  	$resultado=mysqli_query($conexion, "SELECT * FROM datospersonales where usuario='".$_SESSION['usuario']."'");
	  	return $resultado;
	}

	// permite cambiar la clave
	function getCambiarClave($clave)
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "UPDATE usuarios SET clave='$clave' where usuario='".$_SESSION['usuario']."'");
		$respuestas_array = array();
	}

	function getValidarClave()
	{
		global $conexion;
	/*$respuesta = mysqli_query($conexion,"SELECT usuario FROM usuarios where usuario='".$_SESSION['usuario']."'");
	  $respuestas_array = array();
	  while ($fila = $respuesta->fetch_row())
	  $respuestas_array[] = $fila;
		return $respuestas_array;
		$resultado= mysqli_query($conexion,"SELECT usuario FROM usuarios where usuario='".$_SESSION['usuario']."'");
		return $resultado; */

		$respuesta = mysqli_query($conexion,"SELECT clave FROM usuarios where usuario='".$_SESSION['usuario']."'");
		$respuestas_array = array();/*
		while ($fila = mysql_fetch_row($respuesta))
		{
				$respuestas_array[]=$fila[0];
		}
		mysql_free_result($respuesta);*/

		while ($fila = $respuesta->fetch_row())
		{
				$respuestas_array[] = $fila[0];
		}
		//mysqli_free_result($respuesta);
		return $respuestas_array;
	}

	//obtiene la colilla por usuario
	function getMostrarColillas()
	{
		global $conexion;
		$resultado=mysqli_query($conexion, "SELECT * FROM archivos where usuario='".$_SESSION['usuario']."'");
		return $resultado;
	}

	//obtiene lso incidentes por orden Abierto, en proceso, cerrado
	function getMostrarIncidentes()
	{
	  global $conexion;
	  $resultado=mysqli_query($conexion, "SELECT * from incidentes Order by FIELD(estado, 'Abierto', 'En proceso', 'Cerrado');");
	  return $resultado;
	}

	//genera vector con datos para exportar a excel
	function getExportar()
	{
	  global $conexion;
	  $resultado=mysqli_query($conexion, "SELECT * from incidentes");
    $vector = array();
    while($row = mysqli_fetch_assoc($resultado))
    {
      $vector[] = $row;
  	}
  	return $vector;
	}

	function getConsultarIncidentes($noID)
  	{
	    global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM incidentes WHERE ID='".$noID."' ");
		$row = mysqli_fetch_assoc($respuesta);
		return $row;

	}

	function getContarID()
	{
		global $conexion;
		$countID=mysqli_query($conexion, "SELECT count(ID) As id from incidentes");
		$row = mysqli_fetch_assoc($countID);
		$countID = $row['id'];
		return $countID;
	}

     // permite mostrar la colilla de pago
	function getMostrarArchivos($usuario)
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM archivos where archivo like '".$_SESSION['usuario']."'");
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		$respuestas_array[] = $fila;
		return $respuestas_array;
	}


	function getMostrarUsuarios($usuario)
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM documentos where usuario like '%$usuario%'");
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		$respuestas_array[] = $fila;
		return $respuestas_array;
	}

	function getTodasCategorias()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;
	}

	function getCategoriasPorUser()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT C.categoria, C.descripcion, C.ruta FROM permisos P INNER JOIN categorias C ON P.ID_Categoria = C.ID_Categoria WHERE usuario =  '".$_SESSION['usuario']."'");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;
	}

	function getCategoriaPorId($id)
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias WHERE ID_Categoria =  '".$id."' ");
		return mysqli_fetch_row($respuesta);
	}

	function getUsuarios()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE admin<>1");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;
	}

	function validarLogin($usuario, $clave)
	{
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion, $consulta);

		if( $fila = mysqli_fetch_row($respuesta) )
		{
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['admin'] = $fila[2];
			return true;
		}
		return false;
	}

	function GetvalidarIncidente($ID, $fecha, $tipo, $incidente, $area, $reportado, $causa, $gestion, $solucion, $estado, $aporta)
	{
	  global $conexion;
	  mysqli_query($conexion, "INSERT INTO incidentes VALUES('$ID','$fecha','$tipo','$incidente','$area','$reportado','$causa','$gestion','$solucion','$estado','$aporta')");
	}

	function GetActualizarIncidente($ID, $tipo, $incidente, $area, $causa, $gestion, $solucion, $estado)
	{
	  global $conexion;
	  mysqli_query($conexion, "UPDATE incidentes SET tipo='$tipo', incidente='$incidente', area='$area', causa='$causa', gestion='$gestion', solucion='$solucion', estado='$estado' WHERE ID='$ID' ");
	} 
	

	function eliminarPermisos($usuario)
	{
		global $conexion;
		mysqli_query($conexion, "DELETE FROM permisos WHERE usuario='".$usuario."'");
	}

	function asignarPermisos($usuario, $idCat)
	{
		global $conexion;
		mysqli_query($conexion, "INSERT INTO permisos VALUES('".$usuario."', '".$idCat."'')");
	}

	function tienePermiso($usuario, $idCat)
	{
		global $conexion;
		$result = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM permisos WHERE usuario='".$usuario."' AND ID_Categoria='".$idCat."' ");
		$row = mysqli_fetch_assoc($result);
		$numero = $row['total'];
		return $numero > 0;
	}

	function editarCategoria($id, $nombre, $descripcion, $ruta)
	{
		global $conexion;
		mysqli_query($conexion, "UPDATE categorias SET categoria='".$nombre."', descripcion='".$descripcion."',ruta='".$ruta."' WHERE ID_Categoria = '".$id."' ");
	}

	function haIniciadoSesion()
	{
		session_start();
		return isset( $_SESSION['usuario'] );
	}

	function esAdmin()
	{
		return $_SESSION['admin'];
	}

	function desconectar()
	{
		global $conexion;
		mysqli_close($conexion);
	}	
?>
