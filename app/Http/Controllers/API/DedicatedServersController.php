<?php

namespace Gameap\Http\Controllers\API;

use Gameap\Http\Controllers\AuthController;
use Gameap\Repositories\DedicatedServersRepository;
use Gameap\Models\DedicatedServer;

class DedicatedServersController extends AuthController
{
    /**
     * The DedicatedServersRepository instance.
     *
     * @var \Gameap\Repositories\DedicatedServersRepository
     */
    public $repository;

    /**
     * DedicatedServersController constructor.
     * @param DedicatedServersRepository $repository
     */
    public function __construct(DedicatedServersRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getIpList(int $id)
    {
        return $this->repository->getIpList($id);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getBusyPorts(int $id)
    {
        return $this->repository->getBusyPorts($id);
    }
}