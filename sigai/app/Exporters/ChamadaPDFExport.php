<?php namespace App\Exporters;

use \TCPDF;
use \Lang;

use Carbon\Carbon;

class ChamadaPDFExport extends TCPDF
{
    private $numLines = 40;
    private $lineHeight = 3.5;
    private $numPeriods = 4;

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
            'align' => 'C'
        ],
        'conteudo' => [
            'width' => 215,
            'align' => 'L'
        ],
        'professor' => [
            'width' => 45,
            'align' => 'C'
        ]
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
        // unidade curricular
        $uc = Lang::get('unidades_curriculares.single_title') . ": " . 
              $turma->unidadeCurricular->nome;
        
        // período de realização
        $fromTo = Lang::get('turmas.from_to_title') . ": " . $turma->data_inicio->format('d/m/Y')
                  . " " . Lang::get('general.to') . " " . $turma->data_fim->format('d/m/Y');

        // professor(es)
        $prof = implode(',', array_map(function($p) {
            return $p['usuario']['nome'];
        }, $turma->professores->toArray()));
        $profTitle = Lang::choice('professores.title', sizeof($prof));

        // carga horária
        $cargaHor = Lang::get('unidades_curriculares.carga_horaria') . ": " . 
                    $turma->unidadeCurricular->carga_horaria;
        
        // turno
        $turno = Lang::get('turmas.shift') . ": " . $turma->turno;
        
        // nome da turma
        $turma = Lang::get('turmas.single_title') . ": " . $turma->nome;
        
        $this->Ln(1);
        $this->SetFont("helvetica","",8.000);
        
        $this->MultiCell(142, 5, $uc, 0, 'L', 0, 0, '', '', true);
        $this->MultiCell(142, 5, $fromTo, 0, 'R', 0, 1, '', '', true);
        $this->MultiCell(142, 5, "$profTitle: $prof", 0, 'L', 0, 0, '', '', true);
        $this->MultiCell(142, 5, "$cargaHor     $turno    $turma", 0, 'R', 0, 1, '', '', true);
    }
    
    public function setTable($chamada, $datas)
    {
        $this->Ln(6);
        
        // Colors, line width and bold font
        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(169,169,169);
        $this->SetTextColor(0,0,0);
        $this->SetLineWidth(0.1);
        
        $this->SetFont('helvetica', '', 7.000);
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
        $this->createConteudoTableHeader();
        $this->setConteudoTableData($aulas);
        $this->setConteudoInformation($info);
    }
    
    protected function createConteudoTableHeader()
    {
        $this->Ln(20);
        $this->SetFont('helvetica', '', 9);
        
        foreach ($this->contentHeaders as $name => $header) {
            $title = Lang::get('chamadas.tbl_'.$name);
            
            $this->Cell($header['width'], 5, $title, 1, 0, $header['align'], 1);
        }
        
        $this->Ln();
    }
    
    protected function setConteudoTableData($aulas)
    {
        foreach ($aulas as $aula) {
            $h = $this->getStringHeight($this->contentHeaders['conteudo']['width'], $aula->conteudo);
        
            $this->MultiCell($this->contentHeaders['dias']['width'], $h, $aula->data->format('d/m/Y'),
                            1, $this->contentHeaders['dias']['align'], 1, 0, '', '', true, 0, false, true, 0);
        
            $this->MultiCell($this->contentHeaders['conteudo']['width'], $h, $aula->conteudo,
                            1, $this->contentHeaders['conteudo']['align'], 1, 0, '', '', true, 0, false, true, 0);
        
            $this->MultiCell($this->contentHeaders['professor']['width'], $h, "--",
                            1, $this->contentHeaders['professor']['align'], 1, 0, '', '', true, 0, false, true, 0);
        
            $this->Ln();
        }
    }
    
    protected function setConteudoInformation($info)
    {
        $this->SetFont('helvetica', '', 10);

        // observações
        $this->Ln(8);
        $this->MultiCell(285, 7, "Obs.: " . str_repeat('_', 130), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);
        $this->Ln();
        $this->SetX(14);
        $this->MultiCell(285, 7, str_repeat('_', 130), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);

        // professor
        $this->Ln(8);
        $this->Cell(285, 5, "Prof.: " . array_get($info, 'professor', ''), 0, 0, 'L', 1);
        
        $this->Ln();
        $this->SetX(14);
        $this->MultiCell(60, 7, str_repeat('_', 29), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);
        
        $this->Ln();
        $this->SetX(14);
        $this->MultiCell(60, 7, str_repeat('_', 29), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);
        
        $this->SetX(90);
        $this->MultiCell(120, 7, "Sup. Educ. e Tec.: " . array_get($info, 'superintendente', ''), 0, 'C', 1, 0, '', '', true, 0, false, true, 0);
        
        
        $this->Ln();
        $this->SetX(14);
        $this->MultiCell(60, 7, str_repeat('_', 29), 0, 'L', 1, 0, '', '', true, 0, false, true, 0);
        
        $this->SetX(90);
        $this->MultiCell(120, 7, "Coord. Educ. Super.: " . array_get($info, 'coordenador', ''), 0, 'C', 1, 0, '', '', true, 0, false, true, 0);
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
                            $value = ($p == 1) ? '.' : 'F';
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
        $yStart = 44.5;
        
        $xEnd = 275;
        $yEnd = 184.5;
        
        $y1 = $yStart + ($linesUsed * $this->lineHeight);
        
        $this->SetDrawColor(0, 0, 0);
        $this->Line($xStart, $y1, $xEnd, $yEnd);
    }
    
    protected function drawRightLine($colsUsed)
    {
        $xStart = 95;
        $yStart = 44.5;
        
        $xEnd = 275;
        $yEnd = 184.5;
        
        $x1 = $xStart + ($colsUsed * $this->headers['datas']['width'] * $this->numPeriods);
        
        $this->SetDrawColor(0, 0, 0);
        $this->Line($x1, $yStart, $xEnd, $yEnd);
    }
    
    protected function createTableBottom()
    {
        $this->SetLineWidth(1);
        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(0,0,0);
        $this->Line(5, 190, 290, 190);
        
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
        $image_file = public_path() . '/img/faculdade_senai.jpg';
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
