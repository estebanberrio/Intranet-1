<?php
	require '../Classes/PHPExcel.php';
  require '../scripts/funciones.php';

  if(! haIniciadoSesion())
  {
	  header('Location: index.html');
  }
  conectar();
  //$vector_rows = getExportar();
  $vector_rows = getMostrarIncidentes();
  //Establecemos en que fila inciara a poner los datos
  $fila = 2;
  // le damos nombre al archivo con fecha y extensión
  $filename = "incidentes".date('Ymd');          
  //Objeto de PHPExcel
  $objPHPExcel  = new PHPExcel();          
  //Propiedades de Documento
  $objPHPExcel->getProperties()->setCreator("Intranet Litoempaques")->setDescription("Reporte Incidentes");
  //Establecemos la pestaña activa y nombre a la pestaña
  $objPHPExcel->setActiveSheetIndex(0);
  $objPHPExcel->getActiveSheet()->setTitle("Incidentes");
  $estiloTituloReporte = array('font' => array('name'=> 'Arial',  'bold'=> true,'italic'=> false,'strike'=> false,  'size' =>13),
  'fill' => array('type'  => PHPExcel_Style_Fill::FILL_SOLID),
  'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_NONE)),
  'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

  $estiloTituloColumnas = array('font' => array('name'  => 'Arial','bold'  => true,'size' =>10,'color' => array('rgb' => 'FFFFFF')),
  'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => '538DD5')),
  'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),
  'alignment' =>  array('horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER));   

  $estiloInformacion = new PHPExcel_Style();

  $estiloInformacion->applyFromArray( array('font' => array('name'  => 'Arial','color' => array('rgb' => '000000')),
  'fill' => array('type'  => PHPExcel_Style_Fill::FILL_SOLID),'borders' => array('allborders' => array(
  'style' => PHPExcel_Style_Border::BORDER_THIN)),'alignment' =>  array('horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER)));

  $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($estiloTituloReporte);
  $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($estiloTituloColumnas);

  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('B1', 'FECHA');
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('C1', 'TIPO');
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('D1', 'INCIDENTE');
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('E1', 'AREA');
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
  $objPHPExcel->getActiveSheet()->setCellValue('F1', 'REPORTADO');
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('G1', 'CAUSA');
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('H1', 'GESTION');
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('I1', 'SOLUCION');
  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('J1', 'ESTADO');
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('K1', 'APORTA');  
  //Recorremos los resultados de la consulta y los imprimimos
  while($rows = $vector_rows->fetch_assoc())
  {            
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['ID']);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['fecha']);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['tipo']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['incidente']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['area']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['reportado']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['causa']);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['gestion']);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['solucion']);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['estado']);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['aporta']);            
    $fila++; //Sumamos 1 para pasar a la siguiente fila
  }
  $fila = $fila-1;  

  $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A1:K".$fila); 
  $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); 
  header('Content-Disposition: attachment; filename="'.$filename.'"');    
  $writer->save('php://output');
  
?>

