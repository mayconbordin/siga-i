<?php namespace App\Services\Contracts;

use App\Models\Aluno;
use App\Models\Aula;

interface ChamadaServiceContract {
    /**
     * Saves a single chamada based on readings from a device.
     *
     * @param array $data Must contain 'device_id' and 'card_id' corresponding to the device that did the reading and the
     *                    userd card that was read. Optionally may also contain a 'timestamp' in the format 'YYYY-MM-DD HH:MM:SS'.
     * @return bool
     */
    public function saveSingleChamada(array $data);

    /**
     * @param Aula $aula
     * @param Aluno $aluno
     * @param array $periods
     * @return mixed
     */
    public function saveOrUpdate(Aula $aula, Aluno $aluno, array $periods);
}