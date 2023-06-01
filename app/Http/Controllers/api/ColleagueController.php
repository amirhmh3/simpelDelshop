<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;
use App\Http\repository\ColleagueRepository;
use App\Http\repository\Repository;
use App\Http\Service\Service;
use Illuminate\Http\Request;

class ColleagueController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, Service $service,ColleagueRepository $repository)
    {
        parent::__construct($request, $service,$repository);
        $service->setRepository($repository);
        $this->service=$service;
        $this->repository=$repository;

    }


}
