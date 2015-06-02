<?php

use App\Repositories\UsuarioRepository;

class ExampleTest extends TestCase {

	public function testBasicExample()
	{
		$user = UsuarioRepository::findByMatricula("1234");
        $this->be($user);
		
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}

}
