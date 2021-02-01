<?php

namespace App\Repositories\Admin\Simulator;

use App\Entity\SimulatorPackages\SimulatorLanguageWord;
use App\Repositories\Admin\AdminAbstractRepository;

class AdminSimulatorLanguageWordRepository extends AdminAbstractRepository
{
    /**
     * AdminSimulatorLanguageWordRepository constructor.
     */
    public function __construct()
    {
        $this->model = new SimulatorLanguageWord();
    }
}
