<?php namespace App\Services\Contracts;

interface AgendaServiceContract {
    /**
     * Retorna agenda de aulas do mês para o professor informado.
     *
     * @param  array $data Pode conter parâmetros de busca: matricula, month e year
     * @return array
     */
    public function getAgenda(array $data);
}