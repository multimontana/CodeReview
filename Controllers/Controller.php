<?php

namespace App\Http\Controllers;

use App\Traits\Query\QueryHelperTrait;
use App\Traits\Request\RequestDataHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use QueryHelperTrait;
    use RequestDataHelper;
}
