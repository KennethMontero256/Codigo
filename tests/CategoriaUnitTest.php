<?php
	require "Data/DataCategoria.php";
	require "Domain/Categoria.php";

	class CategoriaUnitTest extends PHPUnit_Framework_TestCase{
	
		public function testInsertar(){
			$dataCategoria = new DataCategoria();
			$respuesta = $dataCategoria->agregarActualizarCategoria(new Categoria(0,"NuevaCategoria"));
			
			$this->assertEquals(true, $respuesta);
		}
		
		public function testInsertarParaEliminar(){
			$dataCategoria = new DataCategoria();
			$respuesta = $dataCategoria->agregarActualizarCategoria(new Categoria(0,"NuevaCategoria"));
			
			$this->assertEquals(true, $respuesta);
		}

		public function testActualizar(){

			$dataCategoria = new DataCategoria();
			$respuesta = $dataCategoria->actualizarPorNombre("NuevaCategoria->Actualizada","NuevaCategoria");
			
			$this->assertEquals(true, $respuesta);
		}

		public function testEliminar(){

			$dataCategoria = new DataCategoria();
			$respuesta = $dataCategoria->eliminarCategoriaPorNombre("NuevaCategoria");
			
			$this->assertEquals(true, $respuesta);
		}
	}
?>