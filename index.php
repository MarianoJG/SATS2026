<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/hijos.controlador.php";
require_once "controladores/trabajadores.controlador.php";
require_once "controladores/combobox.controlador.php";
require_once "controladores/apoyo_transporte.controlador.php";
require_once "controladores/nueva-base.controlador.php";
require_once "controladores/complemento.controlador.php";
require_once "controladores/cambio-categoria.controlador.php";
require_once "controladores/cambio-adscripcion.controlador.php";
require_once "controladores/comision.controlador.php";
require_once "controladores/escalafon.controlador.php";
require_once "controladores/prestamos.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/hijos.modelo.php";
require_once "modelos/trabajadores.modelo.php";
require_once "modelos/combobox.modelo.php";
require_once "modelos/apoyo_transporte.modelo.php";
require_once "modelos/nueva-base.modelo.php";
require_once "modelos/complemento.modelo.php";
require_once "modelos/cambio-categoria.modelo.php";
require_once "modelos/cambio-adscripcion.modelo.php";
require_once "modelos/comision.modelo.php";
require_once "modelos/escalafon.modelo.php";
require_once "modelos/prestamos.modelo.php";





$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();


