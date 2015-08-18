<?php namespace App\Services\Contracts;

use App\Models\Aluno;
use App\Models\Aula;

interface ChamadaServiceContract {
    /**
     * Salva uma única chamada com base em leitura feita por um dispositivo.
     *
     * @param array $data Deve conter 'device_id' e 'card_id' que correspondem ao dispositivo que fez a leitura e o cartão
     *                    que foi lido. Opcionalmente pode conter o 'timestamp' no formato 'YYYY-MM-DD HH:MM:SS'.
     * @return bool
     */
    public function saveSingleChamada(array $data);

    /**
     * Salva uma chamada de um aluno em determinada aula. Caso a chamada já exista sobrescreve a mesma.
     *
     * @param Aula $aula
     * @param Aluno $aluno
     * @param array $periods
     * @return mixed
     */
    public function saveOrUpdate(Aula $aula, Aluno $aluno, array $periods);
}