<?php

use App\Repositories\UsuarioRepository;
use App\Exceptions\NotFoundError;

class UsuarioRepositoryTest extends TestCase {

	public function testFindById()
	{
	    $usuario = UsuarioRepository::findById(1);
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = UsuarioRepository::findById(9999999);
		    $this->fail('Deveria ser not found');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}
	
	public function testFindByMatricula()
	{
	    $usuario = UsuarioRepository::findByMatricula('15726');
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = UsuarioRepository::findByMatricula('ssds333333');
		    $this->fail('Deveria ser not found');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}
	
	public function testFindByNome()
	{
	    $usuario = UsuarioRepository::findByNome('ABNER BORDA FONSECA');
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = UsuarioRepository::findByNome('ssds333333');
		    $this->fail('Deveria ser not found');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}

}
