<?php namespace App\Services\Contracts;

interface HeartbeatDispositivoServiceContract {
    public function listAll(array $parameters = null);
    public function listByDevice($dispositivoId);
    public function show($id);
    public function save($dispositivoId);
    public function delete($id);
    public function paginate();
}