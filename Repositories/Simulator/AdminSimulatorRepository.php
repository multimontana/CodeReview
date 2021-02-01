<?php

namespace App\Repositories\Admin\Simulator;

use App\Entity\SimulatorPackages\Simulator;
use App\Repositories\Admin\AdminAbstractRepository;

class AdminSimulatorRepository extends AdminAbstractRepository
{
    /**
     * AdminSimulatorRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Simulator();
    }
}
