<?php
namespace App\Repositories;
use App\Order;

class OrderRepository extends BaseRepository{
   
    public function __construct(Order $order){
        $this->entity=$order;
    }
}