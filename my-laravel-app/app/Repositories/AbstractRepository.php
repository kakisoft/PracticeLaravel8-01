<?php

namespace App\Repositories;

use Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $model;

    abstract public function getModelClass(): string;

    // 本当はコンストラクタを２種類作りたかったけど、PHPはオーバーロードがサポートされたなかったよ！
    public function __construct($targetObject = null)
    {
        if( is_null($targetObject) ){
            // $this->model = app($this->getModelClass());
            $this->model = app()->make($this->getModelClass());

        }else{
            $this->model = $targetObject;
        }
    }
}
