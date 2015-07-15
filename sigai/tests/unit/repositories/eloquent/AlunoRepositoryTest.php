<?php

use Illuminate\Pagination\Paginator;
//use \DB;
//use \Hash;

class AlunoRepositoryTest extends TestCase
{
    protected $alunoRepository;

    function __construct()
    {
        $this->alunoRepository = new \App\Repositories\Eloquent\AlunoRepository();
    }

    public function testFindByMatricula()
    {
        $usuario = $this->alunoRepository->findByMatricula('15726');

        $this->assertEquals($usuario->id, 1);
        $this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
        $this->assertEquals($usuario->matricula, '15726');

        try {
            $usuario = $this->alunoRepository->findByMatricula('ssds333333');
            $this->fail('Deveria ser not found');
        } catch (\App\Exceptions\NotFoundError $e) {
            $this->assertTrue(true);
        }
    }

    public function testFindByDispositivo()
    {
        $usuario = $this->alunoRepository->findByDispositivo('111111');

        $this->assertEquals($usuario->id, 1);
        $this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
        $this->assertEquals($usuario->matricula, '15726');
    }

    public function testFindByMatriculaWith()
    {
        $usuario = $this->alunoRepository->findByMatriculaWith('15726', ['usuario', 'chamadas', 'cursos']);

        $this->assertEquals($usuario->id, 1);
        $this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
        $this->assertEquals($usuario->matricula, '15726');

        $this->assertTrue($usuario->chamadas != null);
        $this->assertTrue($usuario->cursos != null);
        $this->assertTrue(sizeof($usuario->cursos->toArray()) == 1);
    }

    public function testSearchByNameAndMatricula()
    {
        $alunos = $this->alunoRepository->searchByNameAndMatricula('15');
        $this->assertGreaterThan(1, sizeof($alunos->all()));

        $alunos = $this->alunoRepository->searchByNameAndMatricula('15', 2);
        $this->assertEquals(0, sizeof($alunos->all()));
    }

    public function testPaginateFirstPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 1;
        });

        $alunos = $this->alunoRepository->paginate('usuarios.nome', 10);

        $this->assertEquals(sizeof($alunos->items()), 10);
        $this->assertEquals($alunos->currentPage(), 1);
        $this->assertEquals($alunos->perPage(), 10);
    }

    public function testPaginateSecondPage()
    {
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $alunos = $this->alunoRepository->paginate('usuarios.nome', 10);

        $this->assertEquals(sizeof($alunos->items()), 10);
        $this->assertEquals($alunos->currentPage(), 2);
        $this->assertEquals($alunos->perPage(), 10);
    }

    public function testPaginateOrder()
    {
        $alunos = $this->alunoRepository->paginate('usuarios.nome', 10);

        $data  = $alunos->toArray();
        $items = $data['data'];

        $sorted = array_sort($items, function($item) {
            return $item['nome'];
        });

        $this->assertEquals(sizeof($items), sizeof($sorted));

        for ($i=0; $i<sizeof($sorted); $i++) {
            $this->assertEquals($items[$i]['nome'], $sorted[$i]['nome']);
        }
    }

    public function testFindByTurmaWithPivot()
    {
        $alunos = $this->alunoRepository->findByTurmaWithPivot(2);

        $this->assertTrue(sizeof($alunos->toArray()) > 1);
        $this->assertTrue($alunos[0]->status != null);
        $this->assertTrue($alunos[0]->curso_origem_id != null);
        $this->assertTrue($alunos[0]->curso_origem_nome != null);
        $this->assertTrue($alunos[0]->curso_origem_sigla != null);
    }

    public function testFindByAulaWithChamada()
    {
        $alunos = $this->alunoRepository->findByAulaWithChamada(2, 1);

        $this->assertTrue(sizeof($alunos->toArray()) == 26);

        foreach ($alunos as $aluno) {
            $this->assertTrue($aluno->id != null);
            $this->assertTrue($aluno->status != null);
            $this->assertTrue($aluno->curso_origem_id != null);
        }
    }

    public function testInsert()
    {
        $data = [
            'matricula' => '1115588848',
            'nome'      => 'José da Silva Pereira',
            'email'     => 'jose.silva.pereira@gmail.com',
            'password'  => '12345'
        ];

        $aluno = $this->alunoRepository->insert($data);

        $this->assertEquals($data['nome'], $aluno->usuario->nome);
        $this->assertEquals($data['matricula'], $aluno->usuario->matricula);
        $this->assertEquals($data['email'], $aluno->usuario->email);
        $this->assertEquals($aluno->id, $aluno->usuario->id);
        $this->assertTrue(Hash::check($data['password'], $aluno->usuario->password));

        try {
            $this->alunoRepository->findByMatricula($data['matricula']);
        } catch (\App\Exceptions\NotFoundError $e) {
            $this->fail($e->getMessage());
        }
    }

    public function testInsertMissingData()
    {
        $data = [
            'matricula' => '1115588848',
            'password'  => '12345'
        ];

        try {
            $aluno = $this->alunoRepository->insert($data);
            $this->fail("Não deveria ter inserido o aluno");
        } catch (Exception $e) {

        }
    }

    public function testUpdateByMatricula()
    {
        $matricula = '15726';
        $data = [
            'matricula' => $matricula,
            'nome'      => 'José da Silva Pereira 2',
            'email'     => 'jose.silva.pereira2@gmail.com',
            'password'  => '12345'
        ];

        $aluno = $this->alunoRepository->updateByMatricula($data, $matricula);

        $this->assertEquals($data['nome'], $aluno->usuario->nome);
        $this->assertEquals($matricula, $aluno->usuario->matricula);
        $this->assertEquals($data['email'], $aluno->usuario->email);
        $this->assertEquals($aluno->id, $aluno->usuario->id);
        $this->assertTrue(Hash::check($data['password'], $aluno->usuario->password));
    }

    public function testUpdateByMatriculaMissingData()
    {
        $matricula = '15726';
        $data = [];

        $aluno = $this->alunoRepository->updateByMatricula($data, $matricula);
    }

    public function testDeleteByMatricula()
    {
        $aluno = $this->alunoRepository->findByMatriculaWith('15726', ['cursos', 'turmas', 'chamadas']);

        // verifica estado antes de remover o aluno
        $chamadas = DB::table('chamadas')->where('aluno_id', $aluno->id)->get();
        $this->assertEquals(sizeof($chamadas), 42);

        $cursos = DB::table('cursos_alunos')->where('aluno_id', $aluno->id)->get();
        $this->assertEquals(sizeof($cursos), 1);

        $turmas = DB::table('alunos_turmas')->where('aluno_id', $aluno->id)->get();
        $this->assertEquals(sizeof($turmas), 3);

        // remove o aluno
        $this->alunoRepository->deleteByMatricula($aluno->usuario->matricula);

        // verifica estado depois de remover o aluno
        $chamadas = DB::table('chamadas')->where('aluno_id', $aluno->id)->get();
        $this->assertEquals(sizeof($chamadas), 0);

        $cursos = DB::table('cursos_alunos')->where('aluno_id', $aluno->id)->get();
        $this->assertEquals(sizeof($cursos), 0);

        $turmas = DB::table('alunos_turmas')->where('aluno_id', $aluno->id)->get();
        $this->assertEquals(sizeof($turmas), 0);

        try {
            $this->alunoRepository->findByMatricula('15726');
            $this->fail("Não deveria ter encontrado o aluno.");
        } catch (\App\Exceptions\NotFoundError $e) {}
    }
}
