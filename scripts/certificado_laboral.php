<?php  
  require '../tfpdf/tfpdf.php';  
  require '../scripts/funciones.php';
  //require '../categorias/justify.php';
  //require '../categorias/justifywrite.php';
  define ("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

  if(!haIniciadoSesion())
  {
  	header('Location: index.html');
  }
  conectar();

  unlink("../scripts/logs.txt");
  //funcion para obtener datos de la base de datos
  $objcertificado = getCertificadoLaboral();
   

    while($row = $objcertificado->fetch_object())	
	{
		$nombre = $row->nombre;
		$cedula = $row->usuario;
		$fecha = new DateTime($row->fecha_ingreso); 
		//$fecha = $row->fecha_ingreso;
		$cargo = $row->cargo;
		$salario = $row->salario;
		$contrato = $row->contrato;
		
	}
	//formato de fecha por día, mes y año.
	$dia = date('d');
	$mes = date('m');
	$year = date('Y');

	//vector para cambio de número de mes a su nombre.
	$vector= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$longitud=count($vector);

	for($i=1; $i<=$longitud; $i++)
	{
    	if($i == $mes)
    	{
    		$mes = $vector[$i-1];
    	}
	}

	//cambio de formato de variables para puntos poner decimales
	$salario = number_format($salario, 0, '', '.');
	$cedula = number_format($cedula, 0, '', '.');

	//inversión del la fecha para mostrar D-M-Y
	$fecha = $fecha->format("d/m/Y");

	//creamos el archivo .txt
	$nombre_archivo = "logs.txt";

	//invocamos, abrimos y llenamos el archivo para poderlo justificar luego.
	if($archivo = fopen($nombre_archivo, "a"))
		{
		  fwrite($archivo,"<p>Hacemos constar que el señor(a) <vb>$nombre</vb>, identificado con cédula de ciudadanía número <vb>$cedula</vb>, tiene contrato con la Empresa desde el <vb>$fecha</vb>, su cargo actual es <vb>$cargo</vb>, devenga un salario básico de <vb>$$salario</vb>, su tipo de contrato es $contrato.</p>");
		  fclose($archivo);
		}

	//cargamos la variable archivo2 con el archivo .txt	
	$file = fopen($nombre_archivo, "r");
	while(!feof($file)) 
	{
		$archivo2 = fgets($file);
	}
	fclose($file);

	//creamos el PDF	
	$pdf = new tFPDF();

	// Stylesheet
	$pdf->SetStyle("p", "Dejavu", "", 0, "0, 0, 0");
	$pdf->SetStyle("vb", "DejaVubold", "", 0, "0, 0, 0");
	

	//definicion del tamaño de la hoja.
	$pdf->AddPage('P', 'A4');
	//definicion de margenes L-T-R sin D
	$pdf->SetMargins('20','15','20');
	//estilo bold

	//definicion de fuente para caracteres especiales
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->AddFont('DejaVuBold','','DejaVuSansCondensed-Bold.ttf',true);
	$pdf->SetFont('DejaVu','',14);	
	//cuerpo del pdf
	$pdf->Image('../imagenes/encabezado.png',10,10,180);
	$pdf->Ln(25);
	$pdf->write(8,'Medellín,');
	$pdf->write(8,' ' .$dia);
	$pdf->write(8,' de');
	$pdf->write(8,' ' .$mes);
	$pdf->write(8,' de');
	$pdf->write(8,' ' .$year);
	$pdf->write(8,'.');
	$pdf->Ln(30);
	$pdf->SetFont('DejaVuBold','',14);
	$pdf->Cell(175,30,'CERTIFICACIÓN', 10, 10,'C');
	$pdf->SetFont('DejaVu','',14);
	$pdf->Ln(15);
	//$pdf->MultiCell(0,8, $archivo2, 0,'J');
	$pdf->WriteTag(0, 8, $archivo2, 0, "J", 0);
	$pdf->Ln(10);
	$pdf->write(8,'Lo anterior se expide a petición del interesado.');
	$pdf->Ln(40);
	$pdf->write(8, 'Atentamente,');
	$pdf->Image('../imagenes/firma.png',15,230,70);
	$pdf->Image('../imagenes/pie.png',170,270,30);
	//fin del pdf
	$pdf->Close();
	//salidad del pdf
	$pdf->Output();
	//$pdf->Output('d','certificado.pdf');
?>
