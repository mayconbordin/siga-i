<?php namespace App\Exporters;

use App\Models\Aluno;
use \TCPDF;
use \Lang;

use Carbon\Carbon;

class ChamadaPDFExport extends TCPDF
{
    private $numLines = 40;
    private $lineHeight = 3.5;
    private $numPeriods = 4;

    private $turma;

    private $headers = [
        'number' => [
            'width' => 10,
            'align' => 'C'
        ],
        'curso' => [
            'width' => 15,
            'align' => 'C'
        ],
        'aluno' => [
            'width' => 65,
            'align' => 'L'
        ],
        'datas' => [
            'width'  => 4,
            'align'  => 'C',
            'repeat' => 45
        ],
        'faltas' => [
            'width'  => 15,
            'align'  => 'C'
        ]
    ];
    
    private $contentHeaders = [
        'dias' => [
            'width' => 25,
            'align' => 'C',
            'header_align' => 'C'
        ],
        'conteudo' => [
            'width' => 215,
            'align' => 'L',
            'header_align' => 'C'
        ],
        'professor' => [
            'width' => 45,
            'align' => 'C',
            'header_align' => 'C'
        ]
    ];

    private $statusLetter = [
        Aluno::STATUS_CANCELADO => 'C',
        Aluno::STATUS_DISPENSADO => 'D',
        Aluno::STATUS_ENSINO_DISTANCIA => 'ED',
        Aluno::STATUS_TRANSFERIDO => 'TR',
        Aluno::STATUS_TRANCAMENTO_MATRICULA => 'TC'
    ];
    
    public function init()
    {
        $this->SetTopMargin(3);
        $this->SetLeftMargin(5);
        $this->SetAutoPageBreak(true, 1);
        $this->SetLineWidth(0.1);
        $this->SetRightMargin(5);
        
        $this->AddPage();
    }
    
    public function setTitle($title)
    {
        $this->Ln(10);
        $this->SetFont("helvetica","B",8.000);
        $this->Cell(286,7,$title,0,1,"C");
    }
    
    public function setInformation($turma)
    {
        $this->turma = $turma;

        // Unidade Curricular
        $this->SetFont("helvetica","B",10);
        $this->Cell(35, 5, Lang::get('unidades_curriculares.single_title') . ": ", 0, 0, 'L', false);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(120, 5, $turma->unidadeCurricular->nome, 0, 0, 'L', false);

        // Perído da turma
        $this->SetX(220);
        $this->SetFont("helvetica","B",10);
        $this->Cell(27, 5, Lang::get('turmas.from_to_title') . ": ", 0, 0, 'L', false);
        $this->SetFont('helvetica', '', 10);
        $text = $turma->data_inicio->format('d/m/Y') . " " . Lang::get('general.to') . " " . $turma->data_fim->format('d/m/Y');
        $this->Cell(80, 5, $text, 0, 0, 'L', false);

        $this->Ln();

        // Professores
        $prof = implode(', ', array_map(function($p) { return $p['usuario']['nome']; }, $turma->professores->toArray()));
        $this->SetFont("helvetica","B",10);
        $this->Cell(20, 5, Lang::choice('professores.title', sizeof($prof)) . ": ", 0, 0, 'L', false);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(150, 5, $prof, 0, 0, 'L', false);

        // Carga horária
        $this->SetX(220);
        $this->SetFont("helvetica","B",10);
        $this->Cell(27, 5, Lang::get('unidades_curriculares.carga_horaria') . ": ", 0, 0, 'L', false);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(15, 5, $turma->unidadeCurricular->carga_horaria, 0, 0, 'L', false);

        $this->Ln();

        // Turno
        $this->SetX(220);
        $this->SetFont("helvetica","B",10);
        $this->Cell(27, 5, Lang::get('turmas.shift') . ": ", 0, 0, 'L', false);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(15, 5, $turma->turno, 0, 0, 'L', false);

        $this->Ln();

        // Nome da turma
        $this->SetX(220);
        $this->SetFont("helvetica","B",10);
        $this->Cell(27, 5, Lang::get('turmas.single_title') . ": ", 0, 0, 'L', false);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(15, 5, $turma->nome, 0, 0, 'L', false);

        $this->Ln();
    }
    
    public function setTable($chamada, $datas, $aulas)
    {
        //$this->Ln(6);

        
        // Colors, line width and bold font
        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(169,169,169);
        $this->SetTextColor(0,0,0);
        $this->SetLineWidth(0.1);
        
        $this->SetFont('helvetica', '', 7.000);
        
        //$this->Ln(-2);
        $oldY = $this->GetY();
        $this->SetY($oldY - 1);
        
        $this->createTableProfessorHeader($aulas);
        
        $this->SetY($oldY);
        $this->Ln(6);
        
        $this->createTableDateHeader($datas);
        
        $this->SetFont('helvetica', 'B', 7.000);
        $this->createTableHeader();
        
        $this->SetFont('helvetica', '', 7.000);
        $this->setTableData($chamada);
        
        //lines
        $this->drawBottomLine(sizeof($chamada));
        $this->drawRightLine(sizeof($datas));
        
        $this->createTableBottom();
    }
    
    
    public function setConteudoTable($aulas, array $info)
    {
        $this->createConteudoTableHeader($info);
        $this->setConteudoTableData($aulas);
        $this->setConteudoInformation($info);
    }
    
    protected function createConteudoTableHeader(array $info)
    {
        $this->Ln(20);

        if (isset($info['mes'])) {
            $this->SetFont('helvetica', '', 11);
            $this->Cell(286, 7, "Mês: " . Lang::get('months.'.$info['mes']), 0, 1, "L");
        }

        $this->SetFont('helvetica', 'b', 9);
        
        foreach ($this->contentHeaders as $name => $header) {
            $title = Lang::get('chamadas.tbl_'.$name);
            
            $this->Cell($header['width'], 5, $title, 1, 0, $header['header_align'], 1);
        }
        
        $this->Ln();
    }
    
    protected function setConteudoTableData($aulas)
    {
        $this->SetFont('helvetica', '', 9);


        foreach ($aulas as $aula) {
            $this->setColor('text', 0, 0, 0);
            $h = $this->getStringHeight($this->contentHeaders['conteudo']['width'], $aula->conteudo);
        
            $this->MultiCell($this->contentHeaders['dias']['width'], $h, $aula->data->format('d/m/Y'),
                            1, $this->contentHeaders['dias']['align'], 1, 0, '', '', true, 0, false, true, 0);
        
            $this->MultiCell($this->contentHeaders['conteudo']['width'], $h, $aula->conteudo,
                            1, $this->contentHeaders['conteudo']['align'], 1, 0, '', '', true, 0, false, true, 0);

            $parts = preg_split('/\s+/', $aula->professor->usuario->nome);
            $name = $parts[0];

            $this->setColor('text', 174, 174, 174);
        
            $this->MultiCell($this->contentHeaders['professor']['width'], $h, $name,
                            1, $this->contentHeaders['professor']['align'], 1, 0, '', '', true, 0, false, true, 0);
        
            $this->Ln();
        }

        $this->setColor('text', 0, 0, 0);
    }
    
    protected function setConteudoInformation($info)
    {
        $this->SetFont('helvetica', '', 10);
        $maxStrLength = 80;
        $maxWidth = 120;

        // observações
        $this->Ln(8);
        $this->MultiCell(285, 7, "Obs.: " . str_repeat('_', 130), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);
        $this->Ln();
        $this->SetX(14);
        $this->MultiCell(285, 7, str_repeat('_', 130), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);

        // professor
        $this->Ln(8);
        
        foreach ($info['professores'] as $professor) {
            $this->Ln(8);

            $text = "Prof.: " . $professor->nome . ' ';

            while (($width = $this->GetStringWidth($text)) < $maxWidth) {
                $text .= '_';
            }

            $this->Cell(285, 5, $text, 0, 0, 'L', 1);

        }


        $goBack = (sizeof($info['professores']) * 8) - 8;
        $this->Ln(-$goBack);

        // Nome da superintendente ...
        /*
        $this->SetX(140);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(32, 7, "Sup. Educ. e Tec.: ", 0, 0, 'L', 1);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(80, 7, array_get($info, 'superintendente', ''), 0, 0, 'L', 1);
        */

        // Nome do coordenador
        $this->Ln();
        $this->SetX(140);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(36, 7, "Coord. Educ. Super.: ", 0, 0, 'L', 1);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(80, 7, array_get($info, 'coordenador', ''), 0, 0, 'L', 1);

        $this->Ln();
        $this->SetX(255);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(36, 7, "Encerrado em: " . $this->turma->data_fim->format('d/m/Y'), 0, 0, 'R', 1);
    }
    
    protected function createTableHeader()
    {
        foreach ($this->headers as $name => $header) {
            $num = isset($header['repeat']) ? $header['repeat'] : 1;
            $title = strtoupper(Lang::get('chamadas.tbl_'.$name));
            
            for($i = 0; $i < $num; ++$i) {
                $this->Cell($header['width'], $this->lineHeight, $title, 1, 0, $header['align'], 1);
            }
        }

        $this->Ln();
    }
    
    protected function createTableProfessorHeader($aulas)
    {
        $this->SetX(95);

        foreach ($aulas as $aula) {
            $parts = preg_split('/\s+/', $aula->professor->usuario->nome);
            $name = $parts[0];

            while (($width = $this->GetStringWidth($name)) > 16) {
                $name = substr($name, 0, -1);
            }

            $this->Cell(16, 4, $name, 0, 0, 'C', 0);
        }
        
    }
    
    protected function createTableDateHeader($dates)
    {
        $this->SetX(96);

        foreach ($dates as $data) {
            $strDate = Carbon::createFromFormat('Y-m-d', $data)->format('d/m');
            
            for ($i=0; $i<$this->numPeriods; $i++) {
                $this->StartTransform();
                $this->Rotate(45);
                $this->Cell(4, 4, $strDate, 0, 0, 'C', 1);
                $this->StopTransform();
            }
        }

        $this->Ln();
    }
    
    protected function setTableData($chamadas)
    {
        $index = 0;
        foreach ($chamadas as $chamada) {
            foreach ($this->headers as $name => $header) {
                $num = isset($header['repeat']) ? $header['repeat'] : 1;
                
                if ($name == 'number')
                    $value = $index + 1;
                else if ($name == 'curso')
                    $value = $chamada->sigla_curso;
                else if ($name == 'aluno')
                    $value = $chamada->nome;
                else if ($name == 'faltas')
                    $value = $chamada->total_faltas;
                else if ($name == 'datas') {
                    $i = 0;
                    
                    // itera os dias de aulas
                    foreach ($chamada->faltas as $f) {
                        // itera cada período da aula
                        foreach ($f->periods as $p) {
                            //$value = ($p == 1) ? '.' : (($chamada->status == 'normal') ? 'F' : 'C');
                            //$value = ($p == NULL) ? $this->statusLetter[$chamada->status] : (($p == 1) ? '.' : 'F');
                            //$value = ($p == '1' || $p == '0') ? (($p == '1') ? '.' : 'F') : 'C';

                            // Caso normal, existe a chamada
                            if ($p == '1' || $p == '0') {
                                $value = ($p == '1') ? '.' : 'F';
                            }

                            // Caso não exista a chamada
                            else if ($p == null) {
                                // Se status é normal = a chamada ainda não foi feita
                                // Por enquanto dá presença
                                if ($chamada->status == 'normal') {
                                    $value = '.';
                                }

                                // Caso contrário, imprime letra do status
                                else {
                                    $value = $this->statusLetter[$chamada->status];
                                }
                            }

                            $this->Cell($header['width'], $this->lineHeight, $value, 1, 0, $header['align'], 1);
                            $i++;
                        }
                    }
                    
                    // prenche as datas em branco (sem chamada ainda)
                    for ($j = $i; $j < $num; $j++) {
                        $this->Cell($header['width'], $this->lineHeight, "", 1, 0, $header['align'], 1);
                    }
                    
                    continue;
                }
                
                for($i = 0; $i < $num; ++$i) {
                    $this->Cell($header['width'], $this->lineHeight, $value, 1, 0, $header['align'], 1);
                }
            }
            
            $this->Ln();
            $index++;
        }

        $linesLeft = $this->numLines - sizeof($chamadas);
        
        for($j = 0; $j < $linesLeft; $j++) {
            foreach ($this->headers as $name => $header) {
                $num = isset($header['repeat']) ? $header['repeat'] : 1;
                
                for($i = 0; $i < $num; ++$i) {
                    $this->Cell($header['width'], $this->lineHeight, "", 1, 0, $header['align'], 1);
                }
            }
            
            $this->Ln();
        }
    }
    
    protected function drawBottomLine($linesUsed)
    {
        $xStart = 5;
        $yStart = 53.5;
        
        $xEnd = 275;
        $yEnd = 193.5;
        
        $y1 = $yStart + ($linesUsed * $this->lineHeight);
        
        $this->SetDrawColor(0, 0, 0);
        $this->Line($xStart, $y1, $xEnd, $yEnd);
    }
    
    protected function drawRightLine($colsUsed)
    {
        $xStart = 95;
        $yStart = 53.5;
        
        $xEnd = 275;
        $yEnd = 193.5;
        
        $x1 = $xStart + ($colsUsed * $this->headers['datas']['width'] * $this->numPeriods);
        
        $this->SetDrawColor(0, 0, 0);
        $this->Line($x1, $yStart, $xEnd, $yEnd);
    }
    
    protected function createTableBottom()
    {
        $this->SetLineWidth(0.6);
        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(0,0,0);
        $this->Line(5, 198, 290, 198);
        
        $this->Ln(6);
        $this->SetFont("helvetica","",8.000);

        $this->MultiCell(215, 0, Lang::get('chamadas.tbl_subtitle'), 0, 'l', 1, 0, '', '', true, 0, false, true, 0);
        $this->MultiCell(70, 0, Lang::get('chamadas.tbl_address'), 0, 'R', 1, 1, '', '', true, 0, false, true, 0);
    }

    public function Header()
    {
        $this->SetFillColor(211,211,211);
        $this->SetLineWidth(0.1);
        $this->SetDrawColor(120,120,120);
    
        // Logo
        $image_file = base_path() . '/resources/assets/img/faculdade_senai.jpg';
        $this->Image($image_file, 5, 3, 50);
        
        $this->Ln(3);
        $this->SetFont("helvetica","B",14.000);
        $this->Cell(286,7,"Diário de Classe",0,1,"C");
        $this->Ln(2);

        $this->SetLineWidth(1);
        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(0,0,0);
        $this->Line(5, 14, 290, 14);
    }
    
    public function Footer()
    {
        $this->SetX(5);
        $this->SetFont("helvetica","B",7.000);
        $this->SetX(5);
        $this->SetY(275);
        $this->SetDrawColor(0,0,0);
        $this->SetFont("helvetica","",6.000);
        $this->SetFont("helvetica","",8.000);
    }
    
}
