<?php

use Illuminate\Pagination\Paginator;
//use \DB;
//use \Hash;
//use \App;

class UserRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new App\Repositories\Test\UserRepository(App::getInstance());
    }

    public function testFindByMatricula()
    {
        $user = $this->repository->findByMatricula('1234');
        $this->assertEquals(49, $user->id);
        $this->assertEquals('1234', $user->matricula);
    }

    public function testFindById()
    {
        $user = $this->repository->find(49);
        $this->assertEquals(49, $user->id);
        $this->assertEquals('1234', $user->matricula);
    }

    public function testFindNameLike()
    {
        $users = $this->repository->findAllByField('nome', 'v%', 'LIKE');
        $this->assertEquals(3, sizeof($users));
    }

    public function testFindByIdNotFound()
    {
        try {
            $user = $this->repository->find(4999);
            $this->fail("Deveria ter gerado uma exception, usuário com esta ID não existe");
        } catch (App\Exceptions\NotFoundError $e){}
    }

    public function testFindInIds()
    {
        $users = $this->repository->findAllByInId([49, 50, 51]);
        $this->assertEquals(3, sizeof($users));
    }

    public function testDelete()
    {
        $this->repository->delete(49);

        try {
            $user = $this->repository->find(49);
            $this->fail("Deveria ter gerado uma exception, usuário com esta ID não existe");
        } catch (App\Exceptions\NotFoundError $e){}
    }

    public function testCreate()
    {
        $data = [
            'matricula' => '1115588848',
            'nome'      => 'José da Silva Pereira',
            'email'     => 'jose.silva.pereira@gmail.com',
            'password'  => '12345'
        ];

        $user = $this->repository->create($data);

        $this->assertNotNull($user->id);
    }

    public function testUpdate()
    {
        $data = [
            'matricula' => '1234',
            'nome'      => 'José da Silva Pereira',
        ];

        $user = $this->repository->update($data, 49);

        $this->assertNotNull($user->id);
        $this->assertEquals($data['nome'], $user->nome);
    }
}
