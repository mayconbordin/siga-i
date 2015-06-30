<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\TurmaRepository;
use App\Models\Turma;
use App\Models\Ambiente;

use \DB;

use Carbon\Carbon;

class TurmaRepositoryTest extends TestCase
{
    protected $turmaRepository;

    public function __construct()
    {
        $this->turmaRepository = new TurmaRepository();
    }

    public function testFindById()
    {
        $turma = $this->turmaRepository->findById(2, 1);

        $this->assertEquals(2, $turma->id);
        $this->assertEquals('S049', $turma->nome);
        $this->assertEquals(1, $turma->unidadeCurricular->id);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->turmaRepository->findById(50, 1);
            $this->fail("Não deveria ter encontrado esta turma.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByIdInvalid()
    {
        try {
            $this->turmaRepository->findById(2, 3);
            $this->fail("Deveria ter ocorrido erro já que esta turma pertence a outra UC.");
        } catch (\App\Exceptions\ValidationError $e) {}
    }

    public function testFindByNomeAndData()
    {
        $inicio = Carbon::createFromFormat('Y-m-d', '2014-07-31');
        $fim    = Carbon::createFromFormat('Y-m-d', '2014-12-18');
        $turma = $this->turmaRepository->findByNomeAndData('S049', $inicio, $fim);

        $this->assertEquals(2, $turma->id);
        $this->assertEquals('S049', $turma->nome);
        $this->assertEquals(1, $turma->unidadeCurricular->id);
    }

    public function testFindByNomeAndDataNotFound()
    {
        $inicio = Carbon::createFromFormat('Y-m-d', '2014-07-28');
        $fim    = Carbon::createFromFormat('Y-m-d', '2014-12-18');

        try {
            $this->turmaRepository->findByNomeAndData('S049', $inicio, $fim);
            $this->fail("Não deveria ter encontrado esta turma.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByIdWith()
    {
        $turma = $this->turmaRepository->findByIdWith(2, 1, ['aulas', 'alunos', 'professores']);

        $this->assertEquals(2, $turma->id);
        $this->assertEquals('S049', $turma->nome);
        $this->assertEquals(1, $turma->unidadeCurricular->id);
        $this->assertEquals(1, sizeof($turma->professores));
        $this->assertEquals(26, sizeof($turma->alunos));
        $this->assertEquals(20, sizeof($turma->aulas));
    }

    public function testFindByIdWithAll()
    {
        $turma = $this->turmaRepository->findByIdWithAll(2, 1);

        $this->assertEquals(2, $turma->id);
        $this->assertEquals('S049', $turma->nome);
        $this->assertEquals(1, $turma->unidadeCurricular->id);
        $this->assertEquals(1, sizeof($turma->professores));
        $this->assertEquals(26, sizeof($turma->alunos));
        $this->assertEquals(20, sizeof($turma->aulas));
    }

    public function testSearchByNome()
    {
        $turmas = $this->turmaRepository->search(10, 'turmas.id', 'asc', 'S049', 'nome');

        $this->assertEquals(2, sizeof($turmas->items()));

        foreach ($turmas as $turma) {
            $this->assertTrue(strpos($turma->nome, 'S049') != -1);
        }
    }

    public function testSearchByDataInicio()
    {
        $turmas = $this->turmaRepository->search(10, 'turmas.id', 'asc', '2014', 'data_inicio');

        $this->assertEquals(3, sizeof($turmas->items()));

        foreach ($turmas as $turma) {
            $this->assertEquals(2014, $turma->data_inicio->year);
        }
    }

    public function testSearchByDataFim()
    {
        $turmas = $this->turmaRepository->search(10, 'turmas.id', 'asc', '2014', 'data_fim');

        $this->assertEquals(3, sizeof($turmas->items()));

        foreach ($turmas as $turma) {
            $this->assertEquals(2014, $turma->data_inicio->year);
        }
    }

    public function testSearchByUC()
    {
        $turmas = $this->turmaRepository->search(10, 'turmas.id', 'asc', 'Sistema', 'unidade_curricular');

        $this->assertEquals(3, sizeof($turmas->items()));

        foreach ($turmas as $turma) {
            $this->assertTrue(strpos($turma->unidadeCurricular->nome, 'Sistema') != -1);
        }
    }

    public function testSearchByProfessores()
    {
        $turmas = $this->turmaRepository->search(10, 'turmas.id', 'asc', 'Valderi', 'professores');

        $this->assertEquals(3, sizeof($turmas->items()));
    }

    public function testUpdate()
    {
        $id   = 2;
        $ucId = 1;

        $data = [
            'data_inicio' => Carbon::createFromFormat('Y-m-d', '2014-06-31'),
            'data_fim'    => Carbon::createFromFormat('Y-m-d', '2014-11-18'),
            'nome'        => 'S049--',
            'unidade_curricular' => \App\Models\UnidadeCurricular::where('id', 3)->first()
        ];

        $turma = $this->turmaRepository->update($data, $ucId, $id);

        $this->assertEquals($id, $turma->id);
        $this->assertEquals($data['nome'], $turma->nome);
        $this->assertEquals($data['unidade_curricular']->id, $turma->unidadeCurricular->id);
        $this->assertEquals($data['data_inicio']->format('Y-m-d'), $turma->data_inicio->format('Y-m-d'));
        $this->assertEquals($data['data_fim']->format('Y-m-d'), $turma->data_fim->format('Y-m-d'));
    }

    public function testInsert()
    {
        $uc = \App\Models\UnidadeCurricular::where('id', 3)->first();

        $data = [
            'data_inicio'    => Carbon::createFromFormat('Y-m-d', '2014-06-31'),
            'data_fim'       => Carbon::createFromFormat('Y-m-d', '2014-11-18'),
            'nome'           => 'S049--',
            'horario_inicio' => Carbon::createFromFormat('H:i:s', '18:30:00'),
            'horario_fim'    => Carbon::createFromFormat('H:i:s', '22:30:00'),
            'ambiente'       => Ambiente::find(1)
        ];

        $turma = $this->turmaRepository->insert($data, $uc);

        $this->assertNotNull($turma->id);
        $this->assertEquals($data['nome'], $turma->nome);
        $this->assertEquals($uc->id, $turma->unidadeCurricular->id);
        $this->assertEquals($data['data_inicio']->format('Y-m-d'), $turma->data_inicio->format('Y-m-d'));
        $this->assertEquals($data['data_fim']->format('Y-m-d'), $turma->data_fim->format('Y-m-d'));
        $this->assertEquals($data['horario_inicio']->format('H:i:s'), $turma->horario_inicio->format('H:i:s'));
        $this->assertEquals($data['horario_fim']->format('H:i:s'), $turma->horario_fim->format('H:i:s'));
    }

    public function testDelete()
    {
        $id   = 2;
        $ucId = 1;

        $turma = Turma::where('id', $id)->with('alunos', 'professores', 'aulas')->first();

        // verifica estado antes de remoção
        $this->assertEquals(1, sizeof($turma->professores));
        $this->assertEquals(26, sizeof($turma->alunos));
        $this->assertEquals(20, sizeof($turma->aulas));

        $this->turmaRepository->deleteById($id, $ucId);

        // pesquisa o banco de dados novamente
        $alunos = DB::table('alunos_turmas')->where('turma_id', $id)->get();
        $professores = DB::table('professores_turmas')->where('turma_id', $id)->get();
        $aulas = DB::table('aulas')->where('turma_id', $id)->get();

        // verifica se o curso foi removido completamente
        $this->assertEquals(0, sizeof($alunos));
        $this->assertEquals(0, sizeof($professores));
        $this->assertEquals(0, sizeof($aulas));
    }

    public function testAttachAluno()
    {
        $id   = 2;
        $ucId = 1;
        $aluno = \App\Models\Aluno::find(27);

        $data = ['status' => \App\Models\Aluno::STATUS_NORMAL, 'curso_origem_id' => 2];

        $result = $this->turmaRepository->attachAluno($data, $ucId, $id, $aluno);

        $this->assertEquals($aluno->id, $result['aluno']->id);
        $this->assertEquals($data['status'], $result['aluno']->pivot->status);
        $this->assertEquals($data['curso_origem_id'], $result['aluno']->pivot->curso_origem_id);

        $this->assertTrue($this->turmaRepository->hasAluno($id, $aluno->id));
    }

    public function testAttachAlunoAlreadyExists()
    {
        $id   = 2;
        $ucId = 1;
        $aluno = \App\Models\Aluno::find(1);

        $data = ['status' => \App\Models\Aluno::STATUS_NORMAL, 'curso_origem_id' => 2];

        try {
            $result = $this->turmaRepository->attachAluno($data, $ucId, $id, $aluno);
            $this->fail("Não deveria ter associado o aluno a turma mais de uma vez.");
        } catch (\App\Exceptions\ConflictError $e) {}
    }

    public function testDetachAluno()
    {
        $id   = 2;
        $ucId = 1;
        $aluno = \App\Models\Aluno::find(1);

        $this->turmaRepository->detachAluno($ucId, $id, $aluno);

        $this->assertNotTrue($this->turmaRepository->hasAluno($id, $aluno->id));
    }

    public function testUpdateAluno()
    {
        $turma = Turma::find(2);
        $ucId = 1;
        $aluno = \App\Models\Aluno::find(1);

        $data = ['status' => \App\Models\Aluno::STATUS_CANCELADO];

        $this->turmaRepository->updateAluno($data, $ucId, $turma->id, $aluno);

        $aluno = $turma->alunos()->where('id', '=', $aluno->id)->first();

        $this->assertEquals($data['status'], $aluno->pivot->status);
    }

    public function testDetachAlunosByCursoOrigem()
    {
        $curso = \App\Models\Curso::find(2);

        $alunosTurmas = DB::table('alunos_turmas')->where('curso_origem_id', $curso->id)->get();
        $this->assertEquals(80, sizeof($alunosTurmas));

        $this->turmaRepository->detachAlunosByCursoOrigem($curso);

        $alunosTurmas = DB::table('alunos_turmas')->where('curso_origem_id', $curso->id)->get();
        $this->assertEquals(0, sizeof($alunosTurmas));
    }

    public function testHasAluno()
    {
        $this->assertTrue($this->turmaRepository->hasAluno(2, 1));
        $this->assertTrue($this->turmaRepository->hasAluno(2, 2));

        $this->assertNotTrue($this->turmaRepository->hasAluno(2, 30));
    }

    public function testAttachProfessor()
    {
        $id   = 3;
        $ucId = 1;
        $professor = \App\Models\Professor::find(49);

        $result = $this->turmaRepository->attachProfessor($ucId, $id, $professor);

        $this->assertEquals($professor->id, $result['professor']->id);

        $this->assertTrue($this->turmaRepository->hasProfessor($id, $professor->id));
    }

    public function testAttachProfessorAlreadyExists()
    {
        $id   = 2;
        $ucId = 1;
        $professor = \App\Models\Professor::find(49);

        try {
            $this->turmaRepository->attachProfessor($ucId, $id, $professor);
            $this->fail("Não deveria ter associado o professor a turma mais de uma vez.");
        } catch (\App\Exceptions\ConflictError $e) {}
    }

    public function testDetachProfessor()
    {
        $id   = 2;
        $ucId = 1;
        $professor = \App\Models\Professor::find(49);

        $this->turmaRepository->detachProfessor($ucId, $id, $professor);

        $this->assertNotTrue($this->turmaRepository->hasProfessor($id, $professor->id));
    }

    public function testHasProfessor()
    {
        $this->assertTrue($this->turmaRepository->hasProfessor(2, 49));
        $this->assertTrue($this->turmaRepository->hasProfessor(5, 49));

        $this->assertNotTrue($this->turmaRepository->hasProfessor(2, 50));
    }
}