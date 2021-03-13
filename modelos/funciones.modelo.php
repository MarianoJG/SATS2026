<?php

Function  _ListarCategorias(){


$host = 'localhost';
$base = 'dbsatsx';
$usuario = 'root';
$password ='1234';
try{
  $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM categorias');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['categoria']."'>".$row['categoria']."</option>";
    }
  }

?>




<?php

Function  _ListarDepartamentos(){


$host = 'localhost';
$base = 'dbsatsx';
$usuario = 'root';
$password ='1234';
try{
  $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM departamento');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['departamento']."'>".$row['departamento']."</option>";
    }
  }

?>

<?php

Function  _ListarEscolaridad(){


$host = 'localhost';
$base = 'dbsatsx';
$usuario = 'root';
$password ='1234';
try{
  $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM escolaridad');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['escolaridad']."'>".$row['escolaridad']."</option>";
    }
  }

?>




<?php

Function  _ListarColonias(){


$host = 'localhost';
$base = 'dbsatsx';
$usuario = 'root';
$password ='1234';
try{
  $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM colonias');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['colonia']."'>".$row['colonia']."</option>";
    }
  }

?>
