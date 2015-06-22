<?php namespace App\Services\Contracts;

interface DiarioServiceContract
{
    public function closeDiario($ucId, $turmaId, $month);
    public function sendDiario($ucId, $turmaId, $month);
    public function showDiario($ucId, $turmaId, $month = null);
    public function saveDiario($filepath, $ucId, $turmaId, $month = null);
}
