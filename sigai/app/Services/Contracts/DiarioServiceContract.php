<?php namespace App\Services\Contracts;

use App\Models\DiarioEnvio;
use App\Models\StatusDiario;

interface DiarioServiceContract
{
    /**
     * Fecha um diário para uma turma e mês específicos e envia o mesmo para os diretórios definidos na configuração.
     * Presume que o usuário logado é o professor que está fechando o diário.
     *
     * @param int $ucId    ID da unidade curricular
     * @param int $turmaId ID da turma
     * @param int $month   Mês que será fechado
     * @return StatusDiario
     */
    public function closeDiario($ucId, $turmaId, $month);

    /**
     * Envia um diário existente para os os diretórios definidos na configuração.
     *
     * @param int $ucId    ID da unidade curricular
     * @param int $turmaId ID da turma
     * @param int $month   Mês que será fechado
     * @return DiarioEnvio
     */
    public function sendDiario($ucId, $turmaId, $month);

    /**
     * Gera o PDF do diário de uma turma para todo o período ou apenas um mês.
     *
     * @param int $ucId    ID da unidade curricular
     * @param int $turmaId ID da turma
     * @param int|void $month   Mês que será fechado
     * @return mixed Retorna saída PDF
     */
    public function showDiario($ucId, $turmaId, $month = null);

    /**
     * Gera o PDF do diário de uma turma para todo o período ou apenas um mês e salve o conteúdo no caminho específicado
     * nos sistemas de arquivos definidos na configuração.
     *
     * @param string $filepath Nome do arquivo a ser salvo
     * @param int $ucId    ID da unidade curricular
     * @param int $turmaId ID da turma
     * @param int|void $month   Mês que será fechado
     * @return null
     */
    public function saveDiario($filepath, $ucId, $turmaId, $month = null);
}
