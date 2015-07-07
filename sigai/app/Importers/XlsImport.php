<?php namespace App\Importers;

use App\Exceptions\XlsImportException;
use App\Models\Aluno;

use PHPExcel;
use PHPExcel_Cell;
use PHPExcel_IOFactory;

use \Lang;
use \Log;

class XlsImport
{
    private $reader;  
    private $xls;  
    
    public $cursos = array();
    public $unidadeCurricular;
    public $turma;
    public $aulas;
    public $alunos = array();
    
    
    private $mapCursos = [
        'AUTOMAÇÃO INDUSTRIAL' => 'AUTOMAÇÃO INDUSTRIAL',
        'AUT' => 'AUTOMAÇÃO INDUSTRIAL',
        'ANÁLISE DESENVOLVIMENTO SISTEMAS' => 'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS',
        'ADS' => 'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS',
        'REDES DE COMPUTADORES' => 'REDES DE COMPUTADORES',
        'REDES' => 'REDES DE COMPUTADORES',
        'SISTEMAS EMBARCADOS' => 'SISTEMAS EMBARCADOS',
        'SEMB' => 'SISTEMAS EMBARCADOS',
        'SISTEMAS DE TELECOMUNICAÇÕES' => 'SISTEMAS DE TELECOMUNICAÇÕES',
        'TEL' => 'SISTEMAS DE TELECOMUNICAÇÕES'
    ];
    
    private $mapCursoSigla = [
        'AUTOMAÇÃO INDUSTRIAL' => 'AI',
        'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS' => 'ADS',
        'REDES DE COMPUTADORES' => 'RC',
        'SISTEMAS EMBARCADOS' => 'SE',
        'SISTEMAS DE TELECOMUNICAÇÕES' => 'ST'
    ];
    
    private $mapStatus = [
        'C'  => Aluno::STATUS_CANCELADO,
        'TR' => Aluno::STATUS_TRANSFERIDO,
        'TC' => Aluno::STATUS_TRANCAMENTO_MATRICULA,
        'D'  => Aluno::STATUS_DISPENSADO
    ];
    
    public function __construct($fileName)
    {
        $start = microtime(true);

        if (!file_exists($fileName)) {
		    throw new XlsImportException(Lang::get('importar.file_not_found', ['file' => $fileName]));
	    }
	    
	    set_time_limit(0);
	    ini_set('memory_limit', '-1');
	    
        $this->reader = PHPExcel_IOFactory::createReaderForFile($fileName);
        $this->reader->setReadDataOnly(true);
        
	    $this->xls = $this->reader->load($fileName);

        $end = microtime(true);

        Log::info("Load time for Excel file: ".($end - $start)." seconds");
    }
    
    public function readAll()
    {
        $this->readTabListas();
        $this->readTabPlano();
	    $this->readTabProducao();
	    $this->readFaultsTab();
    }
    
    public function getData()
    {
        return [
            'cursos'             => $this->cursos,
	        'unidade_curricular' => $this->unidadeCurricular,
            'turma'              => $this->turma,
	        'aulas'              => $this->aulas,
	        'alunos'             => $this->alunos
        ];
    }
    
    /**
     * Recupera a lista de cursos existentes
     */
    public function readTabListas()
    {
	    $objWorksheet = $this->xls->getSheetByName("Listas");
	
	    $highestRow    = $objWorksheet->getHighestRow();
	    $highestColumn = $objWorksheet->getHighestColumn();
	
	    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	
	    $nameTurma = $objWorksheet->getCellByColumnAndRow(20, 2)->getCalculatedValue();
	
	    for ($row = 1; $row <= $highestRow; $row++)
	    {
		    for ($col = 0; $col <= $highestColumnIndex; $col ++)
		    {
			    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();

                if ($value == "Área")
                {
				    $rowTest = $row;
				    $rowTest++;
				    
				    for (; $rowTest <= $highestRow; $rowTest ++)
				    {
					    $nameCurso = $objWorksheet->getCellByColumnAndRow( $col, $rowTest )->getCalculatedValue();

					    if ($nameCurso != null)
					    {
						    $nome = $this->getNomeCurso($nameCurso);
						    
						    $this->cursos [] = array (
							    "nome"  => "$nome",
							    "sigla" => $this->getCursoSigla($nome)
						    );
					    }
				    }
				    break;
			    }
		    }
	    }
    }
    
    /**
     * Recupera informações sobre a unidade curricular, turma e a lista de aulas
     */
    public function readTabPlano()
    {
	    $objWorksheet = $this->xls->getSheetByName("Plano");
	
	    $highestRow    = $objWorksheet->getHighestRow();
	    $highestColumn = $objWorksheet->getHighestColumn();
	
	    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	
	    for ($row = 1; $row <= $highestRow; $row++)
	    {
		    for ($col = 0; $col <= $highestColumnIndex; $col++)
		    {
		        $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
		        
		        // Unidade Curricular
		        if (($col == 1) && ($row == 11) && $value === "Unidade Curricular:")
		        {
				    $this->fetchUnidadeCurricular($row, $col, $objWorksheet);
			    }
		        
		        // Turmas
		        if (($col == 1) && ($row == 19) && $value === "Turma:")
		        {
				    $this->fetchTurma($row, $col, $objWorksheet);
			    }
			    
			    // Aulas
			    if (($col == 5) && ($row == 23) && $value === "Prof.")
			    {
				    $this->fetchDataAulas($row, $col, $objWorksheet, $highestRow);
			    }
		    }
	    }
	    
	    $this->fetchConteudo($objWorksheet, $highestRow);
    }
    
    public function readTabProducao()
    {
        $objWorksheet = $this->xls->getSheetByName("Produção");
	
	    $highestRow    = $objWorksheet->getHighestRow();
	    $highestColumn = $objWorksheet->getHighestColumn();
	
	    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	    
	    $flag = false;
	    
	    // Note: column index is 0-based while row index is 1-based. That means 'A1' ~ (0,1)
	    for($row = 1; $row <= $highestRow; $row++)
	    {
		    $aluno = [];
		    
		    for($col = 0; $col <= $highestColumnIndex; $col++)
		    {
			    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
			
			    $curso = $objWorksheet->getCellByColumnAndRow(1, $row)->getCalculatedValue();
			    
			    if ($curso != null && strlen($curso) > 0) {
			        $aluno['curso'] = $this->getNomeCurso($curso);
			    }
			    
			    if (($col == 0) && ($value == 'No')) {
				    $flag = true;
				    $row++;
				    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
			    }
			    
			    if (($curso == null)) {
				    $flag = false;
			    }
			    
			    if ($flag)
			    {
				    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
				
				    if ($col == 2) {
					    $aluno['nome'] = "$value";
				    }
				
				    if ($col == 3)
				    {
				        if (($value == 0) || ($value == null) || strlen(trim($value)) == 0) {
							throw new XlsImportException(Lang::get('importar.missing_data_producao'));
						}
						
					    $aluno['matricula'] = "$value";
					    $aluno['faltas'] = [];
					    $this->alunos[$aluno['nome']] = $aluno;
				    }
			    }
		    }
		    
		    if (sizeof($this->alunos) > 0 && sizeof($aluno) == 0) {
		        break;
		    }
	    }
    }
    
    public function readFaultsTab()
    {
        $ano = $this->getYear();
        
        for($mes = 1; $mes <= 12; $mes++)
        {
		    $objWorksheet = $this->xls->getSheetByName ("$mes");
		    
		    if ($objWorksheet == null) {
			    continue;
		    }
		    
		    $highestRow    = $objWorksheet->getHighestRow();
		    $highestColumn = $objWorksheet->getHighestColumn();
		
		    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString ( $highestColumn );
		
		    $col = 2;
		    $row = 15;
		    $nomeAluno = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
		
		    if ($nomeAluno == "NOME DOS ALUNOS")
		    {
			    for ($rowAluno = 16; ($rowAluno <= $highestRow) && ($rowAluno != null); $rowAluno ++)
			    {
				    $proxDia = 0;
				    $colAluno = 2;
				
				    $nomeAluno = $objWorksheet->getCellByColumnAndRow($colAluno, $rowAluno)->getCalculatedValue();
				
				    if ($nomeAluno != null)
				    {
					    $primeiroPer = 3;
					    $rowDia = 15;
					    
					    for ($colDia = 3; $colDia <= $highestColumnIndex;)
					    {
						    $dia = $objWorksheet->getCellByColumnAndRow($colDia, $rowDia)->getOldCalculatedValue();
						
						    $colDia = $colDia + 4;
						
						    if (($dia != null) && ($dia != '#N/A'))
						    {
							    $flagAlunoCanc = false;
							    $alunoStatus = null;
							
							    $rowMes = $rowDia - 2;
							    $mes = $objWorksheet->getCellByColumnAndRow($colDia, $rowMes)->getCalculatedValue();
							
							    $dataFalta = $ano . "-" . $mes . "-" . $dia;
							    $p = [];
							
							    for ($colPer = ($primeiroPer + 4 * $proxDia); $colPer < $colDia; $colPer ++)
							    {
								    $presenca = $objWorksheet->getCellByColumnAndRow ($colPer, $rowAluno)->getCalculatedValue();
								    $presenca = strtoupper($presenca);
								
								    if (($presenca === '.') || ($presenca === "") || ($presenca == null)) {
									    $p[] = 1;
								    } elseif (($presenca === 'F') || ($presenca === 'f')) {
									    $p[] = 0;
								    } elseif (($presenca === 'C') || ($presenca === 'D') || 
								              ($presenca === 'TR') || ($presenca === 'TC')) {
									    $flagAlunoCanc = true;
									    $alunoStatus = $presenca;
								    }
							    }
							    
							    $proxDia++;
							    
							    // add presença to aluno
							    // se cancelado, add status
							    if ($flagAlunoCanc) {
							        $this->alunos[$nomeAluno]['status'] = $this->getNomeStatus($alunoStatus);
							    } else {
							        $this->alunos[$nomeAluno]['status'] = Aluno::STATUS_NORMAL;
							        $this->alunos[$nomeAluno]['faltas'][$dataFalta] = $p;
						        }
						    }
					    }
				    } else {
					    break;
				    }
			    }
		    }
	    }
    }
    
    
    protected function fetchUnidadeCurricular($row, $col, $worksheet)
    {
        $colUnidade = $col + 1;
	    $colCargaHoraria = $colUnidade;
	    $rowCargaHoraria = $row + 6;
	    $nomeUnidade = $worksheet->getCellByColumnAndRow($colUnidade, $row)
	                             ->getCalculatedValue();
	    $cargaHoraria = $worksheet->getCellByColumnAndRow($colCargaHoraria, $rowCargaHoraria)
	                              ->getCalculatedValue();
	    $sigla_uc = substr($nomeUnidade, 0, 4);

	    $this->unidadeCurricular = [
	        "nome"          => $nomeUnidade,
		    "carga_horaria" => $cargaHoraria,
		    "sigla"         => $sigla_uc 
	    ];
    }
    
    protected function fetchTurma($row, $col, $worksheet)
    {
	    $colTurma = $col + 1;
	    $nomeTurma = $worksheet->getCellByColumnAndRow($colTurma, $row)->getCalculatedValue();
	
	    if ($nomeTurma != null)
	    {
		    $data_inicio_turmas = $worksheet->getCellByColumnAndRow(2, 16)->getCalculatedValue();
		    $UNIX_DATE = ($data_inicio_turmas - 25569) * 86400;
		    $data_inicio_turmas = gmdate ( "Y-m-d", $UNIX_DATE );
		
		    $data_fim_turmas = $worksheet->getCellByColumnAndRow(4, 16)->getCalculatedValue();
		
		    $UNIX_DATE = ($data_fim_turmas - 25569) * 86400;
		    $data_fim_turmas = gmdate ( "Y-m-d", $UNIX_DATE );

		    $this->turma = [
			    "data_inicio" => "$data_inicio_turmas",
			    "data_fim"    => "$data_fim_turmas",
			    "nome"        => "$nomeTurma"
		    ];
	    }
    }
    
    protected function fetchDataAulas($row, $col, $worksheet, $highestRow)
    {
        $ano = $this->getYear();
	    $rowTest = $row + 1;

	    for(; $rowTest <= $highestRow; $rowTest ++)
	    {
		    $value = $worksheet->getCellByColumnAndRow($col, $rowTest)
		                        ->getCalculatedValue ();
		
		    if ($value === "GERENCIAMENTO DA UC") break;
		
		    // verifica se coluna F tem um nome de professor
		    if (($value != null) && ($value != "Prof.") && 
		        ($value !== "sex") && ($value !== 0))
		    {
			    $colTest = $col - 3;
			    $mes = $worksheet->getCellByColumnAndRow($colTest, $rowTest)
			                      ->getCalculatedValue();
			
			    $colTest = $colTest + 1;
			    $dia = $worksheet->getCellByColumnAndRow($colTest, $rowTest)
			                     ->getCalculatedValue ();

			    $data = $ano . "-" . $mes . "-" . $dia;
			
			    $this->aulas[$data] = array(
				    "data" => "$data"
			    );
		    }
	    }
    }
    
    protected function fetchConteudo($worksheet, $highestRow)
    {
        $col = 1;
		$row = 19;

		$value = $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
		
		if ($value == "Turma:")
		{
			$col ++;
			$turma = $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
			
			$ano = $this->getYear();
			
			$col = 5;
			$contador = 0;

			for ($rowTest = 23; $rowTest <= $highestRow; $rowTest ++)
			{
				$value = $worksheet->getCellByColumnAndRow( $col, $rowTest)
				                   ->getCalculatedValue();
				
				if (($value != null) && ($value != "Prof.") &&
				    ($value !== "GERENCIAMENTO DA UC") && ($value !== "sex"))
				{
					$colTest = $col - 3;
					$mes = $worksheet->getCellByColumnAndRow($colTest, $rowTest)
					                 ->getCalculatedValue();
					
					$colTest = $colTest + 1;
					$dia = $worksheet->getCellByColumnAndRow($colTest, $rowTest)
					                 ->getCalculatedValue();
					
					$data = $ano . "-" . $mes . "-" . $dia;
					
					$colTest = $col + 2;
					
					$conteudo = $worksheet->getCellByColumnAndRow($colTest, $rowTest)
					                      ->getCalculatedValue();
					      
				    if (isset($this->aulas[$data])) {
				        $this->aulas[$data]['conteudo'] = "$conteudo";
				    }
				}
			}
		}
    }
    
    
    protected function getYear()
    {
        return substr($this->turma['data_fim'], 0, 4);
    }
    
    protected function getNomeCurso($nome)
    {
        $nome = trim($nome);
        
        if (isset($this->mapCursos[$nome])) {
            return $this->mapCursos[$nome];
        } else {
            return $nome;
        }
    }
    
    protected function getCursoSigla($nome)
    {
        $nome = trim($nome);
        
        if (isset($this->mapCursoSigla[$nome])) {
            return $this->mapCursoSigla[$nome];
        } else {
            return $nome;
        }
    }
    
    protected function getNomeStatus($nome)
    {
        $nome = trim($nome);
        
        if (isset($this->mapStatus[$nome])) {
            return $this->mapStatus[$nome];
        } else {
            return $nome;
        }
    }
    
}
