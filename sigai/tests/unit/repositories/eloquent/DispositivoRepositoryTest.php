<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\DispositivoRepository;

use App\Models\Dispositivo;

use Carbon\Carbon;
use Illuminate\Foundation\Application;

use \DB;

class DispositivoRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new DispositivoRepository(Application::getInstance());
    }

    public function testFindById()
    {
        $dispositivo = $this->repository->find(1);
        $this->assertEquals(1, $dispositivo->id);
        $this->assertEquals("111111", $dispositivo->codigo);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->find(100);
            $this->fail("Deveria ter retornado erro, dispositivo procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByCodigo()
    {
        $dispositivo = $this->repository->findByCodigo("111111");
        $this->assertEquals(1, $dispositivo->id);
    }

    public function testSearchByCodigo()
    {
        $dispositivos = $this->repository->findAllByField('codigo', '1%', 'LIKE');
        $this->assertEquals(1, sizeof($dispositivos));
        $this->assertEquals(1, $dispositivos[0]->id);
    }

    public function testListAll()
    {
        $dispositivos = $this->repository->all();
        $this->assertEquals(9, sizeof($dispositivos));
    }

    public function testPaginate()
    {
        $dispositivos = $this->repository->paginate(2);
        $this->assertEquals(2, sizeof($dispositivos));
        $this->assertEquals(1, $dispositivos->currentPage());
        $this->assertEquals(2, $dispositivos->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $dispositivos = $this->repository->paginate(2);
        $this->assertEquals(2, sizeof($dispositivos));
        $this->assertEquals(2, $dispositivos->currentPage());
        $this->assertEquals(2, $dispositivos->perPage());
    }

    public function testUpdate()
    {
        $data = [
            'codigo' => '6d9s5ds9a5d9sa4ds4ad',
            'usuario'  => \App\Models\User::find(12),
            'tipo'   => \App\Models\TipoDispositivo::find(3)
        ];

        $dispositivo = $this->repository->update($data, 1);

        $this->assertEquals($data['codigo'], $dispositivo->codigo);
        $this->assertEquals($data['usuario']->id, $dispositivo->usuario->id);
        $this->assertEquals($data['tipo']->id, $dispositivo->tipo->id);
    }

    public function testInsert()
    {
        $data = [
            'codigo' => '10-AD-4A-E8-52-EA',
            'usuario'  => \App\Models\User::find(12),
            'tipo'   => \App\Models\TipoDispositivo::find(3)
        ];

        $dispositivo = $this->repository->create($data);

        $this->assertNotNull($dispositivo->id);
        $this->assertEquals($data['codigo'], $dispositivo->codigo);
        $this->assertEquals($data['usuario']->id, $dispositivo->usuario->id);
        $this->assertEquals($data['tipo']->id, $dispositivo->tipo->id);
    }

    public function testDeleteById()
    {
        $id = 1;

        $this->repository->delete($id);

        $dispositivo = Dispositivo::where('id', $id)->first();

        $this->assertNull($dispositivo);
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->delete(100);
            $this->fail("Deveria ter ocorrido falha, este dispositivo não existe.");
        } catch (NotFoundError $e) {}
    }
}