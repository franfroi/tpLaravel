<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\TransferRequest;
use Illuminate\Http\Request;
use App\User;
use App\Wallet;
use App\Money;

use App\Repositories\UserRepository;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     private $UserRepo;
     private $walletRepo;

     public function __construct(UserRepository $UserRepo , WalletRepository $walletRepo)
     {
         $this->UserRepo=$UserRepo;
         $this->walletRepo=$walletRepo;
      
     }

    public function account()
    {
      
        return view('account');
    }

    //form
   
    public function accountModify(AccountRequest $request){
        $userId=Auth::user()->id;
        $mailcurrent=Auth::user()->email; 
         
      
        $r=$request->all();
        $name=$r['name'];
        $email=$r['email'];
       
        //  //check mail
        // if ($email!=$mailcurrent)
        // {
        //     $User=$this->UserRepo->checkMail($email);
          
        //     if($User)
        //     {
        //        return redirect()
        //      ->route("account")
        //      ->with('message', "E-mail exists yet");
        //     }
            
          
        // }
        
        //update
        $User=$this->UserRepo->updateWithDB($userId,$name,$email);
              
         return redirect()
         ->route("home")
         ->with('message', "user modified");
        
    }  

    public function showWallet(){
        $userId=Auth::user()->id;
        $wallet=$this->walletRepo->getWallet($userId);
        return view('home',array("wallet"=>$wallet));
    }


    public function transfer(){

        $userId=Auth::user()->id;
        $transfer=$this->walletRepo->getWallet($userId);
        foreach ($transfer as $item){
            $key[]=$item->key;
           
        }
       
        return view('transfer',array("key"=>$key));

    //     $money = Money::all();
    //     $arrayCategs=array();
    //     foreach ($money as $c){
    //         $arrayDescriptionMoney[$c['id']] = $c->description;
    //         // je met à gauche l'id et à droite la description en string
    //         // exemple: id =>'bitcoin',
           
    //     }
     
    //      return view('transfer',array("money"=>$arrayDescriptionMoney));
     }

    public function setTransfer(TransferRequest $request){
        $userId=Auth::user()->id;
        $mailcurrent=Auth::user()->email; 

        $wallet = Wallet::all();
        $arraywallet=array();
        // foreach ($wallet as $element){
        //    $element->key;
        //    dd(  $element);
        // }
       
       
        // $r=$request->all();
        // $wallet=$r['wallet'];
        // $type=$r['type'];
        // $amount=$r['amount'];

        // $wallet=$this->walletRepo->transferMoney($wallet,$type,$amount,$id);
    }
}
