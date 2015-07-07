<?php

use App\Exceptions\NotFoundError;
use App\Models\Ambiente;

use Carbon\Carbon;

use \DB;

class AmbienteRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new \App\Repositories\Eloquent\AmbienteRepository();
        $this->repository->setTurmaRepository(new \App\Repositories\Eloquent\TurmaRepository());
        $this->repository->setAulaRepository(new \App\Repositories\Eloquent\AulaRepository());
    }

    public function testFindById()
    {
        $ambiente = $this->repository->findById(1);

        $this->assertEquals(1, $ambiente->id);
        $this->assertEquals('sala 101', $ambiente->nome);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->findById(40);
            $this->fail("Deveria ter retornado erro, ambiente procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByNome()
    {
        $ambiente = $this->repository->findByNome("sala 101");
        $this->assertEquals(1, $ambiente->id);
    }

    public function testSearchByName()
    {
        $ambientes = $this->repository->searchByName("sala");
        $this->assertEquals(10, sizeof($ambientes));

        $this->assertEquals(1, $ambientes[0]->id);
        $this->assertEquals(2, $ambientes[1]->id);
    }

    public function testListAll()
    {
        $ambientes = $this->repository->listAll();
        $this->assertEquals(16, sizeof($ambientes));
    }

    public function testPaginate()
    {
        $ambientes = $this->repository->paginate('nome', 2);
        $this->assertEquals(2, sizeof($ambientes));
        $this->assertEquals(1, $ambientes->currentPage());
        $this->assertEquals(2, $ambientes->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $ambientes = $this->repository->paginate('nome', 2);
        $this->assertEquals(2, sizeof($ambientes));
        $this->assertEquals(2, $ambientes->currentPage());
        $this->assertEquals(2, $ambientes->perPage());
    }

    public function testUpdate()
    {
        $id = 1;
        $data = [
            'nome'  => 'SALA-101'
        ];

        $ambiente = $this->repository->update($data, $id);

        $this->assertEquals($data['nome'], $ambiente->nome);
    }

    public function testUpdateWithTipo()
    {
        $id = 1;
        $data = [
            'nome'  => 'SALA-101',
            'tipo'  => \App\Models\TipoAmbiente::find(2)
        ];

        $ambiente = $this->repository->update($data, $id);

        $this->assertEquals($data['nome'], $ambiente->nome);
        $this->assertEquals($data['tipo']->id, $ambiente->tipo->id);
    }

    public function testInsert()
    {
        $data = [
            'nome'  => 'ROOM 237',
            'tipo'  => \App\Models\TipoAmbiente::find(1)
        ];

        $ambiente = $this->repository->insert($data);

        $this->assertNotNull($ambiente->id);
        $this->assertEquals($data['nome'], $ambiente->nome);
        $this->assertEquals($data['tipo']->id, $ambiente->tipo->id);
    }

    public function testDeleteById()
    {
        $id = 1;
        $ambiente = Ambiente::where('id', $id)->with('aulas', 'turmas')->first();

        // verifica estado antes de remoção
        $this->assertEquals(0, sizeof($ambiente->aulas));
        $this->assertEquals(1, sizeof($ambiente->turmas));

        // remove o ambiente
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $aulas = DB::table('aulas')->where('ambiente_id', $id)->get();
        $turmas = DB::table('turmas')->where('ambiente_default_id', $id)->get();

        // verifica se o ambiente foi removido completamente
        $this->assertEquals(0, sizeof($aulas));
        $this->assertEquals(0, sizeof($turmas));
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->deleteById(100);
            $this->fail("Deveria ter ocorrido falha, este ambiente não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testAttachDispositivo()
    {
        $dev = \App\Models\OAuthClient::where('id', 'client3id')->first();
        $result = $this->repository->attachDispositivo(1, $dev);

        $ambiente = $this->repository->findById(1);
        $this->assertEquals(2, sizeof($ambiente->dispositivos));
        $this->assertTrue($this->repository->hasDispositivo(1, "client3id"));
    }

    public function testAttachDispositivoAlreadyAttached()
    {
        $dev = \App\Models\OAuthClient::where('id', 'client1id')->first();

        try {
            $result = $this->repository->attachDispositivo(1, $dev);
            $this->fail("Deveria ter ocorrido falha, este dispositivo já está vínculado ao ambiente.");
        } catch (\App\Exceptions\ConflictError $e) {}
    }

    public function testDetachDispositivo()
    {
        $dev = \App\Models\OAuthClient::where('id', 'client1id')->first();
        $this->repository->detachDispositivo(1, $dev);

        $ambiente = $this->repository->findById(1);
        $this->assertEquals(0, sizeof($ambiente->dispositivos));
    }

    public function testHasDispositivo()
    {
        $this->assertTrue($this->repository->hasDispositivo(1, "client1id"));
        $this->assertFalse($this->repository->hasDispositivo(1, "client3id"));
    }
}