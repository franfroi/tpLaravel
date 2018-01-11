<?php

namespace App\Repositories;

Interface InterfaceRepository{

   
    function getAll();
    function getById($id);
    function create(array $attributes);
    function update($id, array $attributes);
    function delete($id);

}