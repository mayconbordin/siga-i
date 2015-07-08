<?php

use App\Exceptions\NotFoundError;
use App\Models\TipoAmbiente;

use Carbon\Carbon;

use \DB;

class TipoAmbienteRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $ambienteRepo = new \App\Repositories\Eloquent\AmbienteRepository();
        $ambienteRepo->setAulaRepository(new \App\Repositories\Eloquent\AulaRepository());
        $ambienteRepo->setTurmaRepository(new \App\Repositories\Eloquent\TurmaRepository());

        $this->repository = new \App\Repositories\Eloquent\TipoAmbienteRepository();
        $this->repository->setAmbienteRepository($ambienteRepo);
    }

    public function testFindById()
    {
        $tipoAmbiente = $this->repository->findById(1);

        $this->assertEquals(1, $tipoAmbiente->id);
        $this->assertEquals('sala de aula', $tipoAmbiente->nome);
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
        $tipoAmbiente = $this->repository->findByNome("sala de aula");
        $this->assertEquals(1, $tipoAmbiente->id);
    }

    public function testSearchByName()
    {
        $tiposAmbiente = $this->repository->searchByName("sala");
        $this->assertEquals(1, sizeof($tiposAmbiente));

        $this->assertEquals(1, $tiposAmbiente[0]->id);
    }

    public function testListAll()
    {
        $tiposAmbiente = $this->repository->listAll();
        $this->assertEquals(2, sizeof($tiposAmbiente));
    }

    public function testPaginate()
    {
        $tiposAmbiente = $this->repository->paginate('nome', 1);
        $this->assertEquals(1, sizeof($tiposAmbiente));
        $this->assertEquals(1, $tiposAmbiente->currentPage());
        $this->assertEquals(1, $tiposAmbiente->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $tiposAmbiente = $this->repository->paginate('nome', 1);
        $this->assertEquals(1, sizeof($tiposAmbiente));
        $this->assertEquals(2, $tiposAmbiente->currentPage());
        $this->assertEquals(1, $tiposAmbiente->perPage());
    }

    public function testUpdate()
    {
        $id = 1;
        $data = [
            'nome' => 'SALA DE AULA'
        ];

        $tipoAmbiente = $this->repository->update($data, $id);

        $this->assertEquals($data['nome'], $tipoAmbiente->nome);
    }

    public function testInsert()
    {
        $data = [
            'nome'  => 'sala de estudos'
        ];

        $tipoAmbiente = $this->repository->insert($data);

        $this->assertNotNull($tipoAmbiente->id);
        $this->assertEquals($data['nome'], $tipoAmbiente->nome);
    }

    public function testDeleteById()
    {
        $id = 1;
        $tipoAmbiente = TipoAmbiente::where('id', $id)->with('ambientes')->first();

        // verifica estado antes de remoção
        $this->assertEquals(10, sizeof($tipoAmbiente->ambientes));

        // remove o ambiente
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $ambientes = DB::table('ambientes')->where('tipo_ambiente_id', $id)->get();

        // verifica se o tipo de ambiente foi removido completamente
        $this->assertEquals(0, sizeof($ambientes));
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->deleteById(100);
            $this->fail("Deveria ter ocorrido falha, este tipo de ambiente não existe.");
        } catch (NotFoundError $e) {}
    }
}