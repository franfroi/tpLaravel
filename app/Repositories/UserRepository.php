<?php
namespace App\Repositories;
use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository{
   
    public function __construct(User $user)
    {
        $this->entity=$user;
    }



    public function updateWithDB($userId,$name,$email){
        $user=DB::update("update users set name =:name, email=:email where id=:id",
        array(
            'name'=>$name,
            'email'=>$email,
            'id'=>$userId
    ));
        return $user;
     }
     public function checkMail($email){
        $user = User::select('email')->where('email', $email)->first();
        return $user;
     
     }
   


}