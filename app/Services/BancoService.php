<?php 

namespace App\Services;

use App\Repositories\BancoRepository;

class BancoService
{
	/**
	 * Repository variable
	 *
	 * @var BancoRepository
	 */
    private $bancoRepository;

    public function __construct(BancoRepository $bancoRepository)
    {
        $this->bancoRepository = $bancoRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->bancoRepository, $method], $args);
    }
}
