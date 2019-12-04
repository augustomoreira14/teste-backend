<?php


namespace App\Domain;


class UserSearch
{
    private $builder;

    public function __construct()
    {
        $this->builder = User::query();
    }

    public function likeName($name)
    {
        if($name){
            $this->builder->where("name", "like", "%$name%");
        }
        return $this;
    }

    public function likeUsername($name)
    {
        if($name){
            $this->builder->where("username", "like", "%$name%");
        }
        return $this;
    }

    public function getBuilder()
    {
        return $this->builder;
    }
}
