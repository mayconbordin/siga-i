<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Curso;
use App\Models\UnidadeCurricular;
use App\Models\Turma;
use App\Models\Aula;
use App\Models\Chamada;

use App\Models\Role;
use App\Models\Permission;

use App\Repositories\AlunoRepository;
use App\Repositories\ProfessorRepository;
use App\Repositories\UsuarioRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        
        $this->call('RolePermissionTablesSeeder');
		$this->command->info('Tabelas de usuários, roles e permissions populadas!');

		$this->call('AlunoTablesSeeder');
		$this->command->info('Tabela alunos populada!');
		
		$this->call('UsuarioTablesSeeder');
		$this->command->info('Tabela usuários (professores) populada!');
		
		$this->call('CursoTablesSeeder');
		$this->command->info('Tabela cursos populada!');
		
		$this->call('ProfessorTablesSeeder');
		$this->command->info('Tabela professores populada!');
		
		$this->call('UnidadeCurricularTablesSeeder');
		$this->command->info('Tabela unidades curriculares populada!');
		
		$this->call('TurmaTablesSeeder');
		$this->command->info('Tabela turmas populada!');

		$this->call('CursoAlunoTablesSeeder');
		$this->command->info('Tabela cursos_alunos populada!');
		
		$this->call('AlunoTurmaTablesSeeder');
		$this->command->info('Tabela alunos_turmas populada!');

		$this->call('CursoUnidadeCurricularTablesSeeder');
		$this->command->info('Tabela cursos_unidades_curriculares populada!');
		
		$this->call('ProfessorTurmaTablesSeeder');
		$this->command->info('Tabela professores_turmas populada!');

		$this->call('AulaTablesSeeder');
		$this->command->info('Tabela aulas populada!');
		
		$this->call('ChamadaTablesSeeder');
		$this->command->info('Tabela chamadas populada!');
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

class RolePermissionTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('usuarios')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
         
        $csv = new CsvReader(base_path() . "/data/roles.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            $owner = new Role();
            $owner->name         = $row['name'];
            $owner->display_name = array_get($row, 'display_name', null);
            $owner->description  = array_get($row, 'description', null);
            $owner->save();
         }
         
         
        $csv = new CsvReader(base_path() . "/data/permissions.csv", true, ',');
        
        $role = [];
         
        while (($row = $csv->nextRow()) !== NULL) {
            $name  = $row['name'];
            $roles = explode(',', $row['roles']);
        
            $p = new Permission();
            $p->name = $name;
            $p->save();
            
            foreach ($roles as $name) {
            try{
                $role[$name] = array_get($role, $name, Role::where('name', $name)->first());
                $role[$name]->attachPermission($p);
            }catch(\Exception $e) {
                echo $name."\n";
                exit;
            }
            }
         }
     }
 }

class AlunoTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('alunos')->truncate();
         
        $csv = new CsvReader(base_path() . "/data/alunos.csv", true, ',');
        
        $role = Role::where('name', 'aluno')->first();
         
        while (($row = $csv->nextRow()) !== NULL) {
           $usuario = new User;
           $usuario->matricula = $row['matricula'];
           $usuario->nome = $row['nome'];
           $usuario->email = str_replace(" ", "_", strtolower($row['nome'])) . "@gmail.com";
           $usuario->password = Hash::make('12345');
           $usuario->save();
           
           $usuario->attachRole($role);
           
           $aluno = new Aluno();
           $aluno->id = $usuario->id;
           $aluno->save();
        }
    } 
}

class CursoTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('cursos')->truncate();
         
        $csv = new CsvReader(base_path() . "/data/cursos.csv", true, ',');
         
         while (($row = $csv->nextRow()) !== NULL) {
           $curso = new Curso;
           $curso->nome = $row['nome'];
           $curso->sigla = $row['sigla'];
           
           try {
            $coordenador = UsuarioRepository::findByMatricula($row['coordenador']);
           } catch (NotFoundError $e) {
                $this->command->error($e->getMessage());
                continue;
            }

           $curso->coordenador()->associate($coordenador);

           $curso->save();
        }
    } 
}


class UsuarioTablesSeeder extends Seeder {
    public function run()
    {
        $csv = new CsvReader(base_path() . "/data/professores.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
           $usuario = new User;
           $usuario->matricula = $row['matricula'];
           $usuario->nome = $row['nome'];
           $usuario->email = str_replace(" ", "_", strtolower($row['nome'])) . "@gmail.com";
           $usuario->password = Hash::make('12345');

           $usuario->save();
        }
    } 
}

class ProfessorTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('professores')->truncate();
         
        $csv = new CsvReader(base_path() . "/data/professores.csv", true, ',');
        
        $profRole  = Role::where('name', 'professor')->first();
        $coordRole = Role::where('name', 'coordenador')->first(); 
 
        while (($row = $csv->nextRow()) !== NULL) {
           $usuario = UsuarioRepository::findByMatricula($row['matricula']);
           /*new User;
           $usuario->matricula = $row['matricula'];
           $usuario->nome = $row['nome'];
           $usuario->email = str_replace(" ", "_", strtolower($row['nome'])) . "@gmail.com";
           $usuario->password = Hash::make('12345');

           $usuario->save();*/
           
           $usuario->attachRole($profRole);
           
           if ($row['tipo'] == 'coordenador') {
               $usuario->attachRole($coordRole);
           }
           
           $professor = new Professor();
           $professor->id = $usuario->id;
           
           $curso = Curso::where('nome', $row['curso_origem'])->first();
           if ($curso == null) {
               $this->command->error("Curso de origem '".$row['curso_origem']."' não existe");
               continue;
           }
           
           $professor->cursoOrigem()->associate($curso);
           
           $professor->save();
        }
    } 
}


class UnidadeCurricularTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('unidades_curriculares')->truncate();

        $csv = new CsvReader(base_path() . "/data/unidades_curriculares.csv", true, ',');
         
         while (($row = $csv->nextRow()) !== NULL) {
            $uc = new UnidadeCurricular;
            $uc->nome = trim($row['nome']);
            $uc->carga_horaria = trim($row['carga_horaria']);
            $uc->sigla = trim($row['sigla']);
            $uc->save();
         }
     }
 }
 
 
class TurmaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('turmas')->truncate();

        $csv = new CsvReader(base_path() . "/data/turmas.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            $turma = new Turma;
            $turma->nome        = trim($row['nome_turma']);
            $turma->data_inicio = trim($row['data_inicio']);
            $turma->data_fim    = trim($row['data_fim']);
            
            $uc = UnidadeCurricular::where('nome', trim($row['nome_unidade']))->first();
            $turma->unidadeCurricular()->associate($uc);
            
            $turma->save();
         }
     }
}

class AlunoTurmaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('alunos_turmas')->truncate();

        $csv = new CsvReader(base_path() . "/data/alunos_turmas.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $aluno = AlunoRepository::findByMatriculaWith(trim($row['aluno_matricula']), ['cursos']);
                $turma = Turma::where('nome', trim($row['nome_turma']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Matricula do aluno ('".$row['aluno_matricula']."') ".
                                      "ou turma ('".$row['nome_turma']."') inválidos");
                continue;
            }
            
            $status = trim($row['status_aluno']);
            
            if ($status == 'NULL') {
                $status = Aluno::STATUS_NORMAL;
            }
            
            $curso = $aluno->cursos[0];
            
            $turma->alunos()->attach($aluno, ['status' => $status, 'curso_origem_id' => $curso->id]);
         }
     }
}

class CursoAlunoTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('cursos_alunos')->truncate();

        $csv = new CsvReader(base_path() . "/data/cursos_alunos.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $aluno = AlunoRepository::findByMatricula(trim($row['matricula_aluno']));
            } catch (NotFoundError $e) {
                $this->command->error("Matricula do aluno ('".$row['matricula_aluno']."') inválida.");
                continue;
            }
                
            try {
                $curso = Curso::where('nome', trim($row['nome_curso']))->first();
            
            } catch (NotFoundError $e) {
                $this->command->error("Curso ('".$row['nome_curso']."') inválido.");
                continue;
            }
            
            $curso->alunos()->attach($aluno);
         }
     }
}


class CursoUnidadeCurricularTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('cursos_unidades_curriculares')->truncate();

        $csv = new CsvReader(base_path() . "/data/cursos_unidades_curriculares.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $curso = Curso::where('nome', trim($row['nome_curso']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Curso ('".$row['nome_curso']."') inválido.");
                continue;
            }
            
            try {
                $uc = UnidadeCurricular::where('nome', trim($row['nome_unidade']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Unidade curricular ('".$row['nome_unidade']."') inválida.");
                continue;
            }
            
            $curso->unidadesCurriculares()->attach($uc);
         }
     }
}


class ProfessorTurmaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('professores_turmas')->truncate();

        $csv = new CsvReader(base_path() . "/data/professores_turmas.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $professor = ProfessorRepository::findByMatricula(trim($row['matricula_professor']));
            } catch (NotFoundError $e) {
                $this->command->error("Professor com matrícula ('".$row['matricula_professor']."') inválido.");
                continue;
            }
            
            try {
                $turma = Turma::where('nome', trim($row['nome_turma']))->first();
             } catch (NotFoundError $e) {
                $this->command->error("Turma ('".$row['nome_turma']."') inválida.");
                continue;
            }

            $turma->professores()->attach($professor);
         }
     }
}


class AulaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('aulas')->truncate();

        $csv = new CsvReader(base_path() . "/data/aulas.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            $aula = new Aula;
            $aula->data = Carbon::createFromFormat('Y-m-d', $row['data_aula']);
            $aula->conteudo = trim($row['conteudo']);
            $aula->obs = trim($row['obs']);
            $aula->status = trim($row['status_aula']);
            $aula->ensino_a_distancia = ($row['ensino_a_distancia'] == 0) ? false : true;
            
            $turma = Turma::where('nome', trim($row['nome_turma']))->first();
            $aula->turma()->associate($turma);
        
            $aula->save();
         }
     }
}

class ChamadaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('chamadas')->truncate();

        $csv = new CsvReader(base_path() . "/data/chamadas.csv", true, ',');
         
        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $aluno = AlunoRepository::findByMatricula(trim($row['aluno_matricula']));
            } catch (NotFoundError $e) {
                $this->command->error("Aluno matrícula ('".$row['aluno_matricula']."') inválido.");
                continue;
            }
            
            try {
                $aula = Aula::where('data', trim($row['data_aula']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Aula na data ('".$row['data_aula']."') inválida.");
                continue;
            }
            
            $chamada = new Chamada;
            $chamada->aluno()->associate($aluno);
            $chamada->aula()->associate($aula);
            
            $chamada->p1 = (trim($row['p1']) == 0) ? false : true;
            $chamada->p2 = (trim($row['p2']) == 0) ? false : true;
            $chamada->p3 = (trim($row['p3']) == 0) ? false : true;
            $chamada->p4 = (trim($row['p4']) == 0) ? false : true;
            
            $chamada->save();
         }
     }
}
