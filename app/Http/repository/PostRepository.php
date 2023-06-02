<?php

namespace App\Http\repository;

use App\Models\Post;
use Illuminate\Support\Str;

class PostRepository extends Repository
{
    public $model;
    public function __construct(Post $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }

    public function store($param)
    {
        $type_file=$param->file('img')->extension();
        $file_name=Str::random(40).".".$type_file;
        $param->file('img')->storeAs('public/file',$file_name);
        $param=$param->all();
        $param["img_url"]=asset("storage/file/".$file_name);
        return $this->model->create($param);
    }

}
