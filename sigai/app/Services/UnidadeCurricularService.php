<?php namespace Services;

use App\Repositories\Contracts\TurmaRepositoryContract;
use Repositories\Contracts\UnidadeCurricularRepositoryContract;
use Services\Contracts\UnidadeCurricularServiceContract;

use \DB;

class UnidadeCurricularService implements UnidadeCurricularServiceContract
{
    protected $ucRepository;

    public function __construct(UnidadeCurricularRepositoryContract $ucRepository)
    {
        $this->ucRepository = $ucRepository;}

    public function deleteById($id)
    {
        $uc = $this->ucRepository->deleteById($id);
    }
}