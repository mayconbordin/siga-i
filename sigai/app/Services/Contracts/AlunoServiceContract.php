<?php namespace App\Services\Contracts;

interface AlunoServiceContract {
    public function listAll(array $parameters);
    public function show($matricula);
    public function edit(array $data, $matricula);
    public function save(array $data);
    public function delete($matricula);
}