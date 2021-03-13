<?php 

require_once "../modelos/conexion.php";


$sql = "SELECT * FROM colonias 
		WHERE colonia LIKE '%".$_GET['q']."%'
		LIMIT 10"; 
$result = $mysqli->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id_colonia'=>$row['id_colonia'], 'text'=>$row['colonia']];
}
echo json_encode($json);


 ?>