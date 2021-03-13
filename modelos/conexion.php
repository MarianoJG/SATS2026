<?php

class Conexion{

static public function conectar(){

	/* $link = new PDO("mysql:host=localhost;dbname=stasacco_Tests",
					"stasacco_admin",
					"@HS20172020");

	$link->exec("set names utf8"); */

	$link = new PDO("mysql:host=localhost;dbname=stasacco_bdsats2021",
					"root",
					"");

	$link->exec("set names utf8");

	return $link;

}

}