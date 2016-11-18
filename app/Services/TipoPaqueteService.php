<?php 

namespace App\Services;

use App\Repositories\TipoPaqueteRepository;

class TipoPaqueteService
{
	/**
	 * Repository variable
	 *
	 * @var TipoPaqueteRepository
	 */
    private $tipoPaqueteRepository;

    public function __construct(TipoPaqueteRepository $tipoPaqueteRepository)
    {
        $this->tipoPaqueteRepository = $tipoPaqueteRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->tipoPaqueteRepository, $method], $args);
    }
}
