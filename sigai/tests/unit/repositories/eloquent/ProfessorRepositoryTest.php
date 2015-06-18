<?php

use AspectMock\Test;

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\ProfessorRepository;
use App\Repositories\Eloquent\CursoRepository;
use App\Models\Turma;
use App\Models\Professor;

use Illuminate\Pagination\Paginator;

use \DB;

class ProfessorRepositoryTest extends TestCase
{
    protected $professorRepository;

    public function __construct()
    {
        $this->professorRepository = new ProfessorRepository();
    }

    public function testFindById()
    {
        $professor = $this->professorRepository->findById(49);

        $this->assertEquals("1234", $professor->usuario->matricula);
        $this->assertEquals("Valderi R. Q. Leithardt", $professor->usuario->nome);
        $this->assertEquals("valderi_r._q._leithardt@gmail.com", $professor->usuario->email);
    }

    public function testFindByIdNotFound()
    {
        try {
            $professor = $this->professorRepository->findById(1);
            $this->fail("Não deveria haver um professor com ID 1.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByIdWith()
    {
        $professor = $this->professorRepository->findByIdWith(49, ['cursoOrigem', 'turmas']);

        $this->assertEquals("1234", $professor->usuario->matricula);
        $this->assertEquals("Valderi R. Q. Leithardt", $professor->usuario->nome);
        $this->assertEquals("valderi_r._q._leithardt@gmail.com", $professor->usuario->email);
        $this->assertEquals(2, $professor->cursoOrigem->id);
        $this->assertEquals(3, sizeof($professor->turmas));
    }

    public function testFindByMatricula()
    {
        $professor = $this->professorRepository->findByMatricula("1234");

        $this->assertEquals($professor->id, $professor->usuario->id);
        $this->assertEquals(49, $professor->usuario->id);
        $this->assertEquals("Valderi R. Q. Leithardt", $professor->usuario->nome);
        $this->assertEquals("valderi_r._q._leithardt@gmail.com", $professor->usuario->email);
    }

    public function testFindByNome()
    {
        $professor = $this->professorRepository->findByNome("Valderi R. Q. Leithardt");

        $this->assertEquals($professor->id, $professor->usuario->id);
        $this->assertEquals(49, $professor->usuario->id);
        $this->assertEquals("1234", $professor->usuario->matricula);
        $this->assertEquals("valderi_r._q._leithardt@gmail.com", $professor->usuario->email);
    }

    public function testSearchByNameAndMatricula()
    {
        $results = $this->professorRepository->searchByNameAndMatricula('G');
        $this->assertEquals(2, sizeof($results));

        $results = $this->professorRepository->searchByNameAndMatricula(null);
        $this->assertEquals(7, sizeof($results));

        $results = $this->professorRepository->searchByNameAndMatricula(null, 2);
        $this->assertEquals(6, sizeof($results));
    }

    public function testPaginateFirstPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 1;
        });

        $professores = $this->professorRepository->paginate('usuarios.nome', 2);

        $this->assertEquals(sizeof($professores->items()), 2);
        $this->assertEquals($professores->currentPage(), 1);
        $this->assertEquals($professores->perPage(), 2);
    }

    public function testPaginateSecondPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $professores = $this->professorRepository->paginate('usuarios.nome', 2);

        $this->assertEquals(sizeof($professores->items()), 2);
        $this->assertEquals($professores->currentPage(), 2);
        $this->assertEquals($professores->perPage(), 2);
    }

    public function testInsert()
    {
        $data = [
            'matricula'     => '1115588848',
            'nome'          => 'José da Silva Pereira',
            'email'         => 'jose.silva.pereira@gmail.com',
            'password'      => '12345',
            'curso_origem'  => \App\Models\Curso::where('id', 2)->first()
        ];

        $professor = $this->professorRepository->insert($data);

        $this->assertEquals($professor->id, $professor->usuario->id);
        $this->assertEquals($data['matricula'], $professor->usuario->matricula);
        $this->assertEquals($data['nome'], $professor->usuario->nome);
        $this->assertEquals($data['email'], $professor->usuario->email);
        $this->assertEquals($data['curso_origem']->id, $professor->cursoOrigem->id);
    }

    public function testUpdateByMatricula()
    {
        $data = [
            'matricula'     => '1234',
            'nome'          => 'José da Silva Pereira',
            'email'         => 'jose.silva.pereira@gmail.com',
            'password'      => '12345',
            'curso_origem'  => \App\Models\Curso::where('id', 3)->first()
        ];

        $professor = $this->professorRepository->updateByMatricula($data, $data['matricula']);

        $this->assertEquals($professor->id, $professor->usuario->id);
        $this->assertEquals($data['matricula'], $professor->usuario->matricula);
        $this->assertEquals($data['nome'], $professor->usuario->nome);
        $this->assertEquals($data['email'], $professor->usuario->email);
        $this->assertEquals($data['curso_origem']->id, $professor->cursoOrigem->id);
    }

    public function testUpdateByMatriculaSameCurso()
    {
        $data = [
            'matricula'     => '1234',
            'nome'          => 'José da Silva Pereira',
            'email'         => 'jose.silva.pereira@gmail.com',
            'password'      => '12345'
        ];

        $professor = $this->professorRepository->updateByMatricula($data, $data['matricula']);

        $this->assertEquals($professor->id, $professor->usuario->id);
        $this->assertEquals($data['matricula'], $professor->usuario->matricula);
        $this->assertEquals($data['nome'], $professor->usuario->nome);
        $this->assertEquals($data['email'], $professor->usuario->email);
        $this->assertEquals(2, $professor->cursoOrigem->id);
    }

    public function testDeleteByMatricula()
    {
        $matricula = '1234';
        $professor = $this->professorRepository->findByMatricula($matricula);

        $turmas = DB::table('professores_turmas')->where('professor_id', $professor->id)->get();
        $this->assertEquals(3, sizeof($turmas));

        $diarios = DB::table('status_diarios')->where('professor_id', $professor->id)->get();
        $this->assertEquals(0, sizeof($diarios));

        $this->professorRepository->deleteByMatricula($matricula);

        $turmas = DB::table('professores_turmas')->where('professor_id', $professor->id)->get();
        $this->assertEquals(0, sizeof($turmas));

        $diarios = DB::table('status_diarios')->where('professor_id', $professor->id)->get();
        $this->assertEquals(0, sizeof($diarios));

        try {
            $this->professorRepository->findByMatricula($matricula);
            $this->fail("Professor deveria ter sido removido.");
        } catch (NotFoundError $e) {}
    }

    public function testDissociateCursoOrigem()
    {
        $cursoOrigem = \App\Models\Curso::where('id', 2)->first();
        $this->professorRepository->dissociateCursoOrigem($cursoOrigem);

        $professores = Professor::whereIn('id', [49, 50, 51])->get();

        foreach ($professores as $professor) {
            $this->assertNull($professor->cursoOrigem);
        }
    }
}
