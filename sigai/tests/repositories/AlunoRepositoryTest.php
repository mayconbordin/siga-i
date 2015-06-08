<?php

use App\Repositories\AlunoRepository;
use App\Exceptions\NotFoundError;

class AlunoRepositoryTest extends TestCase {

	public function testFindByMatricula()
	{
	    $usuario = AlunoRepository::findByMatricula('15726');
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');
		
		try {
		    $usuario = AlunoRepository::findByMatricula('ssds333333');
		    $this->fail('Deveria ser not found');
		} catch (NotFoundError $e) {
		    $this->assertTrue(true);
		}
	}
	
    public function testFindByMatriculaWith()
	{
	    $usuario = AlunoRepository::findByMatriculaWith('15726', ['usuario', 'chamadas', 'cursos']);
	
		$this->assertEquals($usuario->id, 1);
		$this->assertEquals($usuario->nome, 'ABNER BORDA FONSECA');
		$this->assertEquals($usuario->matricula, '15726');

		$this->assertTrue($usuario->chamadas != null);
		$this->assertTrue($usuario->cursos != null);
		$this->assertTrue(sizeof($usuario->cursos->toArray()) == 1);
	}
	
	public function testSearchByNameAndMatricula()
	{
	    $alunos = AlunoRepository::searchByNameAndMatricula('15');
		$this->assertTrue(sizeof($alunos->toArray()) > 1);
		
		
		$alunos = AlunoRepository::searchByNameAndMatricula('15', 2);
		$this->assertTrue(sizeof($alunos->toArray()) > 1);
	}
	
	public function testPaginate()
	{
	    $usuario = AlunoRepository::paginate('usuarios.nome', 9);
		$this->assertTrue(sizeof($usuario->toArray()) == 9);
	}
	
	public function testFindByTurmaWithPivot()
	{
	    $alunos = AlunoRepository::findByTurmaWithPivot(2);
	    
	    $this->assertTrue(sizeof($alunos->toArray()) > 1);
	    $this->assertTrue($alunos[0]->status != null);
		$this->assertTrue($alunos[0]->curso_origem_id != null);
		$this->assertTrue($alunos[0]->curso_origem_nome != null);
		$this->assertTrue($alunos[0]->curso_origem_sigla != null);
	}
	
	public function testFindByAulaWithChamada()
	{
	    $alunos = AlunoRepository::findByAulaWithChamada(2, 1);

	    $this->assertTrue(sizeof($alunos->toArray()) == 26);
	    
	    foreach ($alunos as $aluno) {
	        $this->assertTrue($aluno->id != null);
	        $this->assertTrue($aluno->status != null);
		    $this->assertTrue($aluno->curso_origem_id != null);
	    }
	}
}
