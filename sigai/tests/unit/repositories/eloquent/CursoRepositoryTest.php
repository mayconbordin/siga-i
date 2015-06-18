<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\CursoRepository;
use App\Repositories\Eloquent\TurmaRepository;
use App\Repositories\Eloquent\ProfessorRepository;

use App\Models\Curso;

use Carbon\Carbon;

use \DB;

class CursoRepositoryTest extends TestCase
{
    protected $cursoRepository;

    function __construct()
    {
        $this->cursoRepository = new CursoRepository(new TurmaRepository(), new ProfessorRepository());
    }

    public function testFindById()
    {
        $curso = $this->cursoRepository->findById(2);
        $this->assertEquals(2, $curso->id);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->cursoRepository->findById(10);
            $this->fail("Deveria ter retornado erro, curso procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByNome()
    {
        $curso = $this->cursoRepository->findByNome("ANÁLISE E DESENVOLVIMENTO DE SISTEMAS");
        $this->assertEquals(2, $curso->id);
    }

    public function testSearchByName()
    {
        $cursos = $this->cursoRepository->searchByName("A");
        $this->assertEquals(2, sizeof($cursos));

        $this->assertEquals(1, $cursos[0]->id);
        $this->assertEquals(2, $cursos[1]->id);
    }

    public function testListAll()
    {
        $cursos = $this->cursoRepository->listAll();
        $this->assertEquals(5, sizeof($cursos));
    }

    public function testPaginate()
    {
        $cursos = $this->cursoRepository->paginate('nome', 2);
        $this->assertEquals(2, sizeof($cursos));
        $this->assertEquals(1, $cursos->currentPage());
        $this->assertEquals(2, $cursos->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $cursos = $this->cursoRepository->paginate('nome', 2);
        $this->assertEquals(2, sizeof($cursos));
        $this->assertEquals(2, $cursos->currentPage());
        $this->assertEquals(2, $cursos->perPage());
    }

    public function testUpdate()
    {
        $id = 2;
        $coordenador = \App\Models\User::where('id', 49)->first();
        $data = [
            'nome'  => 'ANÁLISE DE SISTEMAS',
            'sigla' => 'AS'
        ];

        $curso = $this->cursoRepository->update($data, $id, $coordenador);

        $this->assertEquals($data['nome'], $curso->nome);
        $this->assertEquals($data['sigla'], $curso->sigla);
        $this->assertEquals($coordenador->id, $curso->coordenador->id);
    }

    public function testUpdateChangeCoordenador()
    {
        $id = 2;
        $coordenador = \App\Models\User::where('id', 55)->first();
        $data = [
            'nome'  => 'ANÁLISE DE SISTEMAS',
            'sigla' => 'AS'
        ];

        $curso = $this->cursoRepository->update($data, $id, $coordenador);

        $this->assertEquals($data['nome'], $curso->nome);
        $this->assertEquals($data['sigla'], $curso->sigla);
        $this->assertEquals($coordenador->id, $curso->coordenador->id);
    }

    public function testInsert()
    {
        $coordenador = \App\Models\User::where('id', 49)->first();
        $data = [
            'nome'  => 'TESTE DE SISTEMAS',
            'sigla' => 'TS'
        ];

        $curso = $this->cursoRepository->insert($data, $coordenador);

        $this->assertNotNull($curso->id);
        $this->assertEquals($data['nome'], $curso->nome);
        $this->assertEquals($data['sigla'], $curso->sigla);
        $this->assertEquals($coordenador->id, $curso->coordenador->id);
    }

    public function testDeleteById()
    {
        $id = 2;
        $curso = Curso::where('id', $id)->with('alunos', 'unidadesCurriculares', 'professoresOrigem')->first();
        $alunosTurmas = DB::table('alunos_turmas')->where('curso_origem_id', $id)->get();

        // verifica estado antes de remoção
        $this->assertEquals(37, sizeof($curso->alunos));
        $this->assertEquals(5, sizeof($curso->unidadesCurriculares));
        $this->assertEquals(4, sizeof($curso->professoresOrigem));
        $this->assertEquals(80, sizeof($alunosTurmas));

        // remove o curso
        $this->cursoRepository->deleteById($id);

        // pesquisa o banco de dados novamente
        $alunos = DB::table('cursos_alunos')->where('curso_id', $id)->get();
        $ucs = DB::table('cursos_unidades_curriculares')->where('curso_id', $id)->get();
        $professores = DB::table('professores')->where('curso_origem_id', $id)->get();
        $alunosTurmas = DB::table('alunos_turmas')->where('curso_origem_id', $id)->get();

        // verifica se o curso foi removido completamente
        $this->assertEquals(0, sizeof($alunos));
        $this->assertEquals(0, sizeof($ucs));
        $this->assertEquals(0, sizeof($professores));
        $this->assertEquals(0, sizeof($alunosTurmas));
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->cursoRepository->deleteById(100);
            $this->fail("Deveria ter ocorrido falha, este curso não existe.");
        } catch (NotFoundError $e) {}
    }
}