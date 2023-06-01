<?php

namespace App\Http\Service;

use App\Http\Controllers\BaseController;

class Service
{
    public $repository;

    public function setRepository($repository)
    {
        $this->repository=$repository;
    }


}
