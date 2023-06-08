<?php

namespace App\Http\repository;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Str;

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
        $type_file=$param->file('file')->extension();
        $file_name=Str::random(40).".".$type_file;
        $param->file('file')->storeAs('public/file',$file_name);
        $customerId=User::find($param["user_id"])->customer()->first()->id;
        $data=[
            "customer_id"=>$customerId,
            "post_id"=>$param["post_id"],
            "url"=>asset("storage/file/".$file_name),
            "file_type_id"=>$param["file_type_id"]
        ];

        return $this->model->create($data);
    }


    public function getAll($param)
    {
        return $this->model::all()->toArray();
    }

}
