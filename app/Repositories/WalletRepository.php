<?php
namespace App\Repositories;
use App\Wallet;
use Illuminate\Support\Facades\DB;

class WalletRepository extends BaseRepository{
   
    public function __construct(Wallet $wallet)
    {
        $this->entity=$wallet;
    }



    public function getWallet($id){
        $wallet=DB::table('wallets')
        ->where("wallets.user_id","=", $id )
        ->leftJoin('money', 'wallets.money_id', '=', 'money.id')
        ->select('wallets.key' ,'wallets.amount', 'money.description' )
        ->get();
        return $wallet;
      
     }
     public function transferMoney($wallet,$type,$amount,$id){
        DB::transaction(function(){
        //ici mettre le requetes
       
        });
        return true; // si true alors succes
   
    }

}