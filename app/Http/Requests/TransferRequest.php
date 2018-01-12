<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransferRequest extends FormRequest
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
            
           'wallet'=>'required|min:5|max:20',
           'amount' =>'required|numeric|between:1,1000000',
          
      
               
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
        'wallet.required' => 'Wallet required',
        'amount.required'  => 'Amount required ',
        
      
    ];
}
}
