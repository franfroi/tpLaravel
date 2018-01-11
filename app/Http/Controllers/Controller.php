<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use App\User;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     private $UserRepo;
     public function __construct(UserRepository $UserRepo)
     {
         $this->UserRepo=$UserRepo;
      
     }

    public function account()
    {
      
        return view('account');
    }

    //form
   
    public function accountModify(AccountRequest $request){
        $userId=Auth::user()->id;
        $mailcurrent=Auth::user()->email; 
        $current_password = Auth::User()->password;    
      

      
        dump($current_password);
        $r=$request->all();
         $name=$r['name'];
         $email=$r['email'];
         $password=$r['newPassword'];

         if(!Hash::check($password,  $current_password)){
            dd('Return error with current passowrd is not match.');
        }else{
            dd('Write here your update password code');
        }
      
        
         $new=bcrypt(sha1(md5($password)));
        
         dump($new);
         die();
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


}
