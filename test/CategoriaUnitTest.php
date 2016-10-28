<?php
	require "../Data/DataCategoria.php";
	require "../Domain/Categoria.php";

	class CategoriaUnitTest extends PHPUnit_Framework_TestCase{
		private $dataCategoria;

		function __construct(){
			$this->dataCategoria = new DataCategoria();
		}

		public function insertarTest(){
			$respuesta = $this->dataCategoria->agregarActualizarCategoria(new Categoria(0,"pruebaTest"));
			$this->assertEqual(true, $respuesta);
		}

	}
?>