<?php

// require_once "../../../controladores/ciudadano.controlador.php";
// require_once "../../../modelos/ciudadano.modelo.php";
require_once "../../../controladores/servicios.controlador.php";
require_once "../../../modelos/servicios.modelo.php"; 


class imprimirTicketDeServicio{

public $id_servicio;

public function traerImpresionTicketDeServicio(){

//TRAEMOS LA INFORMACIÓN DEL TRABAJADOR


$itemServicio = "id_servicio";
$valorServicio = $this->id_servicio;

$respuestaServicio = ControladorServicio::ctrMostrarServicioSoporteTecnico($itemServicio, $valorServicio);

$fecha = substr($respuestaServicio["fecha_registro"],0);
$fechaAtendido = substr($respuestaServicio["fecha_actualizacion"],0);






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

			<td style="background-color:white; width:250px">
				
				
				<div style="font-size:10px; text-align:center; line-height:35px ">

				Dirección de Inovación Tecnológica y Estr. Dig. 	

				</div>

			</td>

			<td style="background-color:white; width:145px">
				
				
				<div style="font-size:10px; text-align:center; line-height:35px ">
		
					Sistema Mesa de Ayuda			

				</div>

			</td>
			
		</tr>

	</table>
	<br>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');





$bloque11 = <<<EOF

	<table style=" padding:4px 10px;">
		
		<tr>

			<td style="background-color:white; width:540px; font-size:18px; text-align:center ">

				<p> Solicitud de Servicio</p> 


				
			</td>
			
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque11, false, false, false, false, '');


// --------------CONTENIDO DEL EXPEDIENTE-------------------------------------------

$bloque2 = <<<EOF

	


	<table>
		
		<tr>
			
			<td style=" background-color:white; width:100px; font-size:10px; text-align:center; color:gray">

			<div style=" width:70px;  text-align:center;"><img src="images/soportet.png"></div>

				Soporte Técnico Ticket Nº: $respuestaServicio[id_servicio]
				

			</td>


			<td style="background-color:white; width:350px; font-size:14px; text-align:center ">

				<br>
				<br>

				<div>

				     $respuestaServicio[nombre_completo]
				     <br>
					

					<span><small style="color:gray; font-size:9px;"> $respuestaServicio[email] </small></span>
					<p><strong style="color:red; font-size:12px;"> $respuestaServicio[departamento] </strong></p>
					<br>
					<p><strong style="font-size:12px;">Fecha de Registro:</strong><em style="font-size:12px;"> $fecha</em> </p>

				</div> 


				
				

			</td>


			

		
		</tr>


	


	</table>
	


	


	<table style="font-size:11px; padding:10px  ">

		<tr>
		
			<td style=" font-size:11px; background-color:white; width:540px;">

				<strong>Asunto:</strong>  
							

			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">

			
			<em> $respuestaServicio[asunto]</em>				

			</td>

	
		</tr>
	
	</table>
	<br>
	


	<table style="font-size:11px; padding:10px;">

		<tr>
		
			<td style=" font-size:11px; background-color:white; width:540px;">

				<strong>Descripción:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
				<em> $respuestaServicio[descripcion]</em>			

			</td>

		</tr>


	</table>
	<br>


	<table style="font-size:11px; padding:10px;">

		<tr>
		
			<td style=" font-size:11px; background-color:white; width:540px;">

				<strong>Asignado a:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
					<em> $respuestaServicio[asignacion]	 </em>	

			</td>

		</tr>


	</table>

	<br>
	



	<table style="font-size:11px; padding:10px;">

		<tr>
		
			<td style=" font-size:11px; background-color:white; width:540px;">

				<strong>Resolución:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
					<em> $respuestaServicio[resolucion] </em>		

			</td>

		</tr>


	</table>

	<br>




	<table style="font-size:11px; padding:10px;">

		<tr>
		
			<td style=" font-size:11px; background-color:white; width:540px;">

				<strong>Estatus de Solicitud:</strong>  
							
			</td>

		</tr>

	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">
			
					 <strong style="color:green";> $respuestaServicio[estatus] </strong><em> $fechaAtendido </em>
					 $respuestaServicio[cancelar_motivo]

					<strong>&nbsp;</strong> <strong style="color:green";> Tipo de solicitud:</strong> $respuestaServicio[tipo_solicitud]


			</td>

		</tr>


	</table>

	

	<table>
		
		<tr >
		<br>
		<br>
		<br>
		<br>
		<br>

			<td style="background-color:white; width:270px; font-size:11px; text-align:center ">
	
			
				<strong></strong> <strong style="color:red";> $respuestaServicio[capturista_ticket] </strong><br>
				<em style="color:green";> Soporte Técnico </em>
		
			</td>

			<td style="background-color:white; width:270px; font-size:11px; text-align:center ">
	
			
				<strong></strong> <strong style="color:red";> $respuestaServicio[nombre_completo] </strong><br>
				<em style="color:green";> $respuestaServicio[departamento] </em>
	
		
			</td>

				
		
		</tr>	


	</table>





	




	

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');	

//SALIDA DEL ARCHIVO 

$pdf->Output('TicketDeServicio.pdf');

}

}


$TicketDeServicio = new imprimirTicketDeServicio();
$TicketDeServicio -> id_servicio = $_GET["id_servicio"];
$TicketDeServicio -> traerImpresionTicketDeServicio();




 ?>