<?php

require_once "../../../controladores/trabajadores.controlador.php";
require_once "../../../modelos/trabajadores.modelo.php";
require_once "../../../controladores/hijos.controlador.php";
require_once "../../../modelos/hijos.modelo.php"; 


// public $buscarTrabajador;

// 	public function ajaxBuscarTrabajador(){

// 		$item = "id_trabajador";
// 		$valor = $this->buscarTrabajador;

// 		$respuesta = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

// 		echo json_encode($respuesta);

// 	}

class imprimirExpediente{

public $id_trabajador;

public function traerImpresionExpediente(){

//TRAEMOS LA INFORMACIÓN DEL TRABAJADOR


$itemTrabajador = "id_trabajador";
$valorTrabajador = $this->id_trabajador;

$respuestaTrabajador = ControladorTrabajadores::ctrMostrarTrabajadores($itemTrabajador, $valorTrabajador);

$fecha = substr($respuestaTrabajador["f_ingreso"],0);

$fechaNacimiento = substr($respuestaTrabajador["f_nacimiento"],0);










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
			
			<td style="width:150px"><img src="images/stasac-sats2.png"></td>

			<td style="background-color:white; width:390px">
				
				
				<div style="font-size:10px; text-align:center; line-height:35px ">
	
					Sindicato de Trabajadores al Servicio del Ayuntamiento de Culiacán			

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

				<p>Expediente </p> 

				
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

			<img class="img-thumbnail" width="100px" src="../../../$respuestaTrabajador[fotot]">

				Nº Empleado: $respuestaTrabajador[num_empleado]
				

			</td>


			<td style="background-color:white; width:350px; font-size:14px; text-align:center ">

			<br>
			<br>

			<div>

			    $respuestaTrabajador[nombres]
				$respuestaTrabajador[a_paterno]
				$respuestaTrabajador[a_materno]

				<p><strong style="color:red"> $respuestaTrabajador[tipo_empleado] </strong></p>

			</div> 

				<p><strong>Fecha de Ingreso:</strong> $fecha</p>
				

			</td>

			<td style="background-color:white; width:100px">
				
				
				
			</td>
		
		</tr>

		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>


	</table>

	


	<table style="font-size:10px; padding:5px 10px;">

	<tr>
		
			<td style=" font-size:10px; background-color:white; width:540px;">

				<strong>Datos Generales:</strong>  
							

			</td>

			


		</tr>
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:160px">

				Sexo: $respuestaTrabajador[sexo]
							

			</td>

			<td style="border: 1px solid #666; background-color:white; width:180px; text-align:left">
			
				Estado Civil: $respuestaTrabajador[edo_civil]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:200px; text-align:left">
			
				Fecha de Nacimiento: $fechaNacimiento 

			</td>

		</tr>

		

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>



	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:160px">

				Tipo Empleado: $respuestaTrabajador[tipo_empleado]
							

			</td>

			<td style="border: 1px solid #666; background-color:white; width:180px; text-align:left">
			
				Categoria: $respuestaTrabajador[categoria]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:200px; text-align:left">
			
				Departamento: $respuestaTrabajador[departamento]

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Escolaridad: $respuestaTrabajador[escolaridad]
							

			</td>

		</tr>

		

		<tr>
		
		<td style=" background-color:white; width:540px"></td>

		</tr>

	</table>




	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style=" font-size:10px; background-color:white; width:540px;">

				<strong>Dirección:</strong>  
							

			</td>

			


		</tr>


		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:250px">

			Calle y Numero: $respuestaTrabajador[calle_numero]

			</td>
			<td style="border: 1px solid #666; background-color:white; width:290px">

			 $respuestaTrabajador[colonia]
			 , $respuestaTrabajador[municipioestado]
			
			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:250px">

			Telefono: $respuestaTrabajador[telefono]

			</td>
			<td style="border: 1px solid #666; background-color:white; width:290px">

			 Correo Electrónico: $respuestaTrabajador[email]
			
			</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');	

//SALIDA DEL ARCHIVO 

$pdf->Output('expediente.pdf');

}

}


$expediente = new imprimirExpediente();
$expediente -> id_trabajador = $_GET["id_trabajador"];
$expediente -> traerImpresionExpediente();




 ?>