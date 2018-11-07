<?php
	class PDF extends tFPDF
	{
		function Header()
		{
			$this->Image('../imagenes/encabezado.png',5,5,30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,'CERTIFICACION',0,0,'C');			
			$this->Ln(20);
		}
		function Footer()
		{			
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Image('../imagenes/pie.png',15,15,30);
		}
	}
?>
