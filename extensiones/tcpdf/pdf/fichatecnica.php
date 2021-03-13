<?php

require_once "../../../controladores/ciudadano.controlador.php";
require_once "../../../modelos/ciudadano.modelo.php";
require_once "../../../controladores/audiencia.controlador.php";
require_once "../../../modelos/audiencia.modelo.php"; 


class imprimirFichaTecnica{

public $id_audiencia;

public function traerImpresionFichaTecnica(){

//TRAEMOS LA INFORMACIÓN DEL TRABAJADOR


$itemAudiencia = "id_audiencia";
$valorAudiencia = $this->id_audiencia;

$respuestaAudiencia = ControladorAudiencia::ctrMostrarAudiencia($itemAudiencia, $valorAudiencia);

$fecha = substr($respuestaAudiencia["fecha_registro"],0);






//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


// -------CABECERA------------------

$bloque1 = <<<EOF

	<table style=" padding:4px 10px;">
		
		<tr>
			<br>
			
			<td style="width:150px"><img src="images/banner-logos.png"></td>

			<td style="background-color:white; width:195px">
				
				
				<div style="font-size:10px; text-align:center; line-height:35px ">

				 Presidencia - Gobierno de Culiacán	

				</div>

			</td>

			<td style="background-color:white; width:195px">
				
				
				<div style="font-size:10px; text-align:center; line-height:35px ">
		
					Sistema de Atención Ciudadana			

				</div>

			</td>
			
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');





$bloque11 = <<<EOF

	<table style=" padding:4px 10px;">
		
		<tr>

			<td style="background-color:white; width:540px; font-size:18px; text-align:center ">

				<p>Tarjeta Informativa </p> 

				
			</td>
			
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque11, false, false, false, false, '');


// --------------CONTENIDO DEL EXPEDIENTE-------------------------------------------

$bloque2 = <<<EOF

	


	<table>
		
		<tr>
			
			<td style=" background-color:white; width:100px; text-align:center; color:gray">

			<img src="images/avatar.png">

				Folio Nº : $respuestaAudiencia[id_audiencia]
				

			</td>


			<td style="background-color:white; width:350px; font-size:14px; text-align:center ">

				<br>
				<br>

				<div>

				    $respuestaAudiencia[nombre_completo]
					

					<p><strong style="color:red"> $respuestaAudiencia[departamento] </strong></p>

				</div> 


				<p><strong>Fecha de Registro:</strong> $fecha</p>
				

			</td>


			<td style="background-color:white; width:100px">
	
			</td>

		
		</tr>


		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>


	</table>
	


	


	<table style="font-size:14px; padding:5px 10px;">

		<tr>
		
			<td style=" font-size:14px; background-color:white; width:540px;">

				<strong>Asunto:</strong>  
							

			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">

			 $respuestaAudiencia[asunto]
							

			</td>

	
		</tr>
	
	</table>
	<br>
	<br>





	<table style="font-size:14px; padding:5px 10px;">

		<tr>
		
			<td style=" font-size:14px; background-color:white; width:540px;">

				<strong>Descripción:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
					 $respuestaAudiencia[descripcion]		

			</td>

		</tr>


	</table>
	<br>
	<br>



	<table style="font-size:14px; padding:5px 10px;">

		<tr>
		
			<td style=" font-size:14px; background-color:white; width:540px;">

				<strong>Resolucion:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
					 $respuestaAudiencia[resolucion]		

			</td>

		</tr>


	</table>

	<br>
	<br>


	<table style="font-size:14px; padding:5px 10px;">

		<tr>
		
			<td style=" font-size:14px; background-color:white; width:540px;">

				<strong>Estatus de Solicitud:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
					 <strong></strong> <strong style="color:red";> $respuestaAudiencia[estatus] </strong> $respuestaAudiencia[cancelar_motivo]		

			</td>

		</tr>


	</table>

	<br>
	<br>


	

	<br>
	<br>





	<table>
		
		<tr>
		<br>
	
			<td style="background-color:white; width:540px; font-size:14px; text-align:center ">
	
			
				<strong></strong> <strong style="color:red";> $respuestaAudiencia[capturista_au] </strong><br>
				<strong style="color:green";> $respuestaAudiencia[puesto] </strong>
		
			</td>

			<div>
		
				

			</div>  		
		
		</tr>	


	</table>





	




	

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');	

//SALIDA DEL ARCHIVO 

$pdf->Output('fichatecnica.pdf');

}

}


$fichatecnica = new imprimirFichaTecnica();
$fichatecnica -> id_audiencia = $_GET["id_audiencia"];
$fichatecnica -> traerImpresionFichaTecnica();




 ?>