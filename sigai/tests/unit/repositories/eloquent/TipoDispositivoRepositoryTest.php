<?php

use App\Exceptions\NotFoundError;
use App\Models\TipoDispositivo;

use Carbon\Carbon;

use \DB;

class TipoDispositivoRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $oauthClientRepo = new \App\Repositories\Eloquent\OAuthClientRepository();
        $devAlunoRepository = new \App\Repositories\Eloquent\DispositivoRepository();

        $this->repository = new \App\Repositories\Eloquent\TipoDispositivoRepository();
        $this->repository->setOAuthClientRepository($oauthClientRepo);
        $this->repository->setDispositivoRepository($devAlunoRepository);
    }

    public function testFindById()
    {
        $tipo = $this->repository->findById(1);

        $this->assertEquals(1, $tipo->id);
        $this->assertEquals('arduino', $tipo->nome);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->findById(40);
            $this->fail("Deveria ter retornado erro, tipo de ambiente procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByNome()
    {
        $tipo = $this->repository->findByNome("arduino");
        $this->assertEquals(1, $tipo->id);
    }

    public function testSearchByName()
    {
        $tipos = $this->repository->searchByName("a");
        $this->assertEquals(1, sizeof($tipos));

        $this->assertEquals(1, $tipos[0]->id);
    }

    public function testListAll()
    {
        $tipos = $this->repository->listAll();
        $this->assertEquals(3, sizeof($tipos));
    }

    public function testPaginate()
    {
        $tipos = $this->repository->paginate('nome', 1);
        $this->assertEquals(1, sizeof($tipos));
        $this->assertEquals(1, $tipos->currentPage());
        $this->assertEquals(1, $tipos->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $tipos = $this->repository->paginate('nome', 1);
        $this->assertEquals(1, sizeof($tipos));
        $this->assertEquals(2, $tipos->currentPage());
        $this->assertEquals(1, $tipos->perPage());
    }

    public function testUpdate()
    {
        $id = 1;
        $data = [
            'nome' => 'ARDUINO'
        ];

        $tipo = $this->repository->update($data, $id);

        $this->assertEquals($data['nome'], $tipo->nome);
    }

    public function testInsert()
    {
        $data = [
            'nome'  => 'Android'
        ];

        $tipo = $this->repository->insert($data);

        $this->assertNotNull($tipo->id);
        $this->assertEquals($data['nome'], $tipo->nome);
    }

    public function testDeleteById()
    {
        $id = 1;
        $tipo = TipoDispositivo::where('id', $id)->with('oauthClients')->first();

        // verifica estado antes de remoção
        $this->assertEquals(3, sizeof($tipo->oauthClients));

        // remove o tipo de dispositivo
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $clients = DB::table('oauth_clients')->where('tipo_dispositivo_id', $id)->get();

        // verifica se o tipo de dispositivo foi removido completamente
        $this->assertEquals(0, sizeof($clients));
    }

    public function testDeleteByIdWithDispositivosAluno()
    {
        $id = 3;
        $tipo = TipoDispositivo::where('id', $id)->with('dispositivos', 'oauthClients')->first();

        // verifica estado antes de remoção
        $this->assertEquals(0, sizeof($tipo->oauthClients));
        $this->assertEquals(9, sizeof($tipo->dispositivos));

        // remove o tipo de dispositivo
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $dispositivos = DB::table('dispositivos')->where('tipo_dispositivo_id', $id)->get();

        // verifica se o tipo de dispositivo foi removido completamente
        $this->assertEquals(0, sizeof($dispositivos));
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->deleteById(100);
            $this->fail("Deveria ter ocorrido falha, este tipo de dispositivo não existe.");
        } catch (NotFoundError $e) {}
    }
}