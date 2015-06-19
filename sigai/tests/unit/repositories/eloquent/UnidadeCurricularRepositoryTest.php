<?php

use App\Exceptions\NotFoundError;

use Illuminate\Pagination\Paginator;
use \Hash;

class UnidadeCurricularRepositoryTest extends TestCase
{
    protected $ucRepository;

    function __construct()
    {
        $this->ucRepository = new \App\Repositories\Eloquent\UnidadeCurricularRepository();
        $this->ucRepository->setTurmaRepository(new \App\Repositories\Eloquent\TurmaRepository());
    }

    public function testFindById()
    {
        $uc = $this->ucRepository->findById(1);

        $this->assertEquals('S049 - Modelagem de Banco de Dados', $uc->nome);
        $this->assertEquals(70, $uc->carga_horaria);
        $this->assertEquals('S049', $uc->sigla);
    }

    public function testFindByIdNotFound()
    {
        try {
            $uc = $this->ucRepository->findById(10);
            $this->fail("Esta UC não deveria existir.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByIdWith()
    {
        $uc = $this->ucRepository->findByIdWith(1, ['cursos', 'turmas']);

        $this->assertEquals('S049 - Modelagem de Banco de Dados', $uc->nome);
        $this->assertEquals(70, $uc->carga_horaria);
        $this->assertEquals('S049', $uc->sigla);
        $this->assertEquals(3, sizeof($uc->cursos));
        $this->assertEquals(2, sizeof($uc->turmas));
    }

    public function testFindByNome()
    {
        $uc = $this->ucRepository->findByNome('S049 - Modelagem de Banco de Dados');

        $this->assertEquals(1, $uc->id);
        $this->assertEquals(70, $uc->carga_horaria);
        $this->assertEquals('S049', $uc->sigla);
    }

    public function testListAll()
    {
        $ucs = $this->ucRepository->listAll();

        $this->assertEquals(5, sizeof($ucs));
    }

    public function testPaginateFirstPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 1;
        });

        $ucs = $this->ucRepository->paginate(2);

        $this->assertEquals(sizeof($ucs->items()), 2);
        $this->assertEquals($ucs->currentPage(), 1);
        $this->assertEquals($ucs->perPage(), 2);
    }

    public function testPaginateSecondPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $ucs = $this->ucRepository->paginate(2);

        $this->assertEquals(sizeof($ucs->items()), 2);
        $this->assertEquals($ucs->currentPage(), 2);
        $this->assertEquals($ucs->perPage(), 2);
    }

    public function testPaginateWithFirstPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 1;
        });

        $ucs = $this->ucRepository->paginateWith(['cursos', 'turmas'], 2);

        $this->assertEquals(sizeof($ucs->items()), 2);
        $this->assertEquals($ucs->currentPage(), 1);
        $this->assertEquals($ucs->perPage(), 2);
    }

    public function testPaginateWithSecondPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $ucs = $this->ucRepository->paginateWith(['cursos', 'turmas'], 2);

        $this->assertEquals(sizeof($ucs->items()), 2);
        $this->assertEquals($ucs->currentPage(), 2);
        $this->assertEquals($ucs->perPage(), 2);
    }

    public function testAttachCurso()
    {
        $ucId = 2;
        $curso = \App\Models\Curso::find(1);

        $this->ucRepository->attachCurso($ucId, $curso);

        $uc = \App\Models\UnidadeCurricular::where('id', $ucId)->with('cursos')->first();
        $this->assertEquals(2, sizeof($uc->cursos));
    }

    public function testAttachCursoExists()
    {
        $ucId = 2;
        $curso = \App\Models\Curso::find(2);

        try {
            $this->ucRepository->attachCurso($ucId, $curso);
            $this->fail("Deveria ter ocorrido falha, curso já está vínculado a UC.");
        } catch (\App\Exceptions\ConflictError $e) {}
    }

    public function testDetachCurso()
    {
        $ucId = 2;
        $curso = \App\Models\Curso::find(2);

        $this->ucRepository->detachCurso($ucId, $curso);

        $uc = \App\Models\UnidadeCurricular::where('id', $ucId)->with('cursos')->first();
        $this->assertEquals(0, sizeof($uc->cursos));
    }

    public function testDetachCursoDontExists()
    {
        $ucId = 2;
        $curso = \App\Models\Curso::find(1);

        $this->ucRepository->detachCurso($ucId, $curso);

        $uc = \App\Models\UnidadeCurricular::where('id', $ucId)->with('cursos')->first();
        $this->assertEquals(1, sizeof($uc->cursos));
    }

    public function testHasCurso()
    {
        $ucId = 2;
        $curso = \App\Models\Curso::find(2);

        $result = $this->ucRepository->hasCurso($ucId, $curso->id);

        $this->assertTrue($result);
    }

    public function testInsert()
    {
        $data = [
            'nome' => 'Teste UC',
            'sigla' => 'T-UC',
            'carga_horaria' => 70
        ];

        $uc = $this->ucRepository->insert($data);

        $this->assertNotNull($uc->id);
        $this->assertEquals($data['nome'], $uc->nome);
        $this->assertEquals($data['sigla'], $uc->sigla);
        $this->assertEquals($data['carga_horaria'], $uc->carga_horaria);
    }

    public function testUpdate()
    {
        $id = 1;
        $data = [
            'nome' => 'Teste UC',
            'sigla' => 'T-UC',
            'carga_horaria' => 70
        ];

        $uc = $this->ucRepository->update($data, $id);

        $this->assertEquals($id, $uc->id);
        $this->assertEquals($data['nome'], $uc->nome);
        $this->assertEquals($data['sigla'], $uc->sigla);
        $this->assertEquals($data['carga_horaria'], $uc->carga_horaria);


        $uc = $this->ucRepository->findById($id);

        $this->assertEquals($id, $uc->id);
        $this->assertEquals($data['nome'], $uc->nome);
        $this->assertEquals($data['sigla'], $uc->sigla);
        $this->assertEquals($data['carga_horaria'], $uc->carga_horaria);
    }

    public function testDeleteById()
    {
        $id = 1;
        $this->ucRepository->deleteById($id);

        try {
            $this->ucRepository->findById($id);
            $this->fail("Não deveria ter econtrado a UC.");
        } catch (NotFoundError $e) {}

        $cursos = DB::table('cursos_unidades_curriculares')->where('uni_curr_id', $id)->get();
        $this->assertEquals(0, sizeof($cursos));

        $turmas = DB::table('turmas')->where('unidade_curricular_id', $id)->get();
        $this->assertEquals(0, sizeof($turmas));
    }
}