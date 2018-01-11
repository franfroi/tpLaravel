<?php

namespace App\Repositories;

class  BaseRepository implements InterfaceRepository{
    
    protected $entity;

    public function __construct(){
        
    }

    public function getAll(){
        return $this->entity->getAll();
    }

    public function getById($id){
        return $this->entity->find($id);
    }

    public function create(array $attributes){
        return $this->entity->create($attributes);
    }

    public function update($id, array $attributes){
        return $this->entity->find($id)->update($attributes);
    }

    public function delete($id){
        return $this->entity->find($id)->delete();
    }
}