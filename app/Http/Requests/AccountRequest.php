<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
            // The format of the rule is:
            // unique:table,column,except,idColumn
            
           'name'=>'required|min:6|max:20',
           'email'     => Auth::check()
           ? 'required|email|unique:users,email,'.Auth::id()
           : 'required|email|unique:users,email',
          
        //    'currentPassword'=> 'same:password',  
        //    'renewPassword'=> 'same:newPassword',  
           
            
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{


    return [
        'name.required' => 'name required',
        'email.required'  => 'E-mail required ',
        'email.unique'  => 'E-mail exists yet ',
        'email.email'  => 'E-mail address has a wrong format  ',
        'currentPassword.same'=> 'Not a good Password', 
    ];
}
}
