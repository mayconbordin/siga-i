<?php

use App\Exceptions\NotFoundError;

use \Hash;

class UsuarioRepositoryTest extends TestCase
{
    protected $usuarioRepository;

    function __construct()
    {
        $this->usuarioRepository = new \App\Repositories\Eloquent\UsuarioRepository();
    }

	public function testFindById()
	{
        $usuario = $this->usuarioRepository->findById(1);
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = $this->usuarioRepository->findById(9999999);
		    $this->fail('Não deveria ter encontrado este usuário.');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}

	public function testFindByMatricula()
	{
	    $usuario = $this->usuarioRepository->findByMatricula('15726');
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = $this->usuarioRepository->findByMatricula('ssds333333');
		    $this->fail('Deveria ser not found');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}
	
	public function testFindByNome()
	{
	    $usuario = $this->usuarioRepository->findByNome('ABNER BORDA FONSECA');
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = $this->usuarioRepository->findByNome('ssds333333');
		    $this->fail('Deveria ser not found');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}

    public function testIsPasswordValid()
    {
        $result = $this->usuarioRepository->isPasswordValid(1, '12345');
        $this->assertTrue($result);

        $result = $this->usuarioRepository->isPasswordValid(1, '12345666');
        $this->assertFalse($result);
    }

    public function testUpdateById()
    {
        $data = [
            'matricula' => '1115588848',
            'nome'      => 'José da Silva Pereira',
            'email'     => 'jose.silva.pereira@gmail.com',
            'password'  => '12345'
        ];

        $usuario = $this->usuarioRepository->updateById($data, 1);

        $this->assertEquals($data['nome'], $usuario->nome);
        $this->assertEquals($data['matricula'], $usuario->matricula);
        $this->assertEquals($data['email'], $usuario->email);
        $this->assertTrue(Hash::check($data['password'], $usuario->password));

        $usuario = $this->usuarioRepository->findById(1);

        $this->assertEquals($data['nome'], $usuario->nome);
        $this->assertEquals($data['matricula'], $usuario->matricula);
        $this->assertEquals($data['email'], $usuario->email);
        $this->assertTrue(Hash::check($data['password'], $usuario->password));
    }

    public function testUpdateByIdMissingData()
    {
        $this->usuarioRepository->updateById([], 1);
    }
}
