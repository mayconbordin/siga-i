<?php

use App\Importers\XlsImport;

class XlsImportTest extends TestCase
{
    public function testImportXls()
    {
        $file = base_path() . "/../planilhas/S032N.xls";

        $xls = new XlsImport($file);
        $xls->readAll();
        $data = $xls->getData();

        $this->assertArrayHasKey('cursos', $data);
        $this->assertEquals(5, sizeof($data['cursos']));

        $this->assertArrayHasKey('unidade_curricular', $data);
        $this->assertEquals(3, sizeof($data['unidade_curricular']));
        $this->assertEquals('S032', $data['unidade_curricular']['sigla']);

        $this->assertArrayHasKey('turma', $data);
        $this->assertEquals(3, sizeof($data['turma']));
        $this->assertEquals('S032N', $data['turma']['nome']);

        $this->assertArrayHasKey('aulas', $data);
        $this->assertEquals(20, sizeof($data['aulas']));

        foreach ($data['aulas'] as $dateStr => $aula) {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateStr);
            $this->assertEquals(2015, $date->year);
            $this->assertContains($date->month, [2, 3, 4, 5, 6, 7]);
        }

        $this->assertArrayHasKey('alunos', $data);
        $this->assertEquals(18, sizeof($data['alunos']));
        $numAulas = sizeof($data['aulas']);

        foreach ($data['alunos'] as $aluno) {
            $this->assertArrayHasKey('curso', $aluno);
            $this->assertArrayHasKey('nome', $aluno);
            $this->assertArrayHasKey('matricula', $aluno);
            $this->assertArrayHasKey('faltas', $aluno);
            $this->assertEquals($numAulas, sizeof($aluno['faltas']));
        }
    }
}