<?php namespace App\Services\Contracts;

interface AgendaServiceContract {
    /**
     * Retorna agenda de aulas do mês para o professor informado.
     *
     * @param  array $data [matricula=string,default:todos professores; month=integer,default:mês atual; year=integer,default:ano atual]
     * @return array Array associativo com o dia servindo de chave e uma instância de @link{\App\Models\Agenda} como valor.
     */
    public function getAgenda(array $data);
}