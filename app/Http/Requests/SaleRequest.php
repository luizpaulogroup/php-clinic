<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            // 'name' => 'required',
            // 'email' => 'required',
            // 'status'=> 'required',
        );
    }

}
