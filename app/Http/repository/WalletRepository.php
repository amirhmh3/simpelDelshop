<?php

namespace App\Http\repository;


use App\Models\Wallet;
use Illuminate\Support\Str;

class WalletRepository extends Repository
{
    public $model;
    public function __construct(Wallet $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }


}
