<?php
	require "Data/DataCategoria.php";
	require "Domain/Categoria.php";

	class CategoriaUnitTest extends PHPUnit_Framework_TestCase{
	
		public function testInsertar(){
			$dataCategoria = new DataCategoria();
			$respuesta = $dataCategoria->agregarActualizarCategoria(new Categoria(0,"NuevaCategoria"));
			$this->assertEquals(true, $respuesta);
		}

	}
?>