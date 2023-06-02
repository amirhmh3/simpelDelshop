<?php

namespace App\Http\repository;

use App\Models\File;

class FileRepository extends Repository
{
    public $model;
    public function __construct(File $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }

    public function store($param)
    {
        $path=$param->file('file')->store('file');
        $data=[
            "customer_id"=>$param["user_id"],
            "post_id"=>$param["post_id"],
            "url"=>"file:///E:/project/laravel/simpelDelshop/storage/app/".$path,
            "file_type_id"=>$param["file_type_id"]
        ];

        return $this->model->create($data);
    }

}
