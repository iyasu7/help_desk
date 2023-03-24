<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

            // fristname ,
            //   middle_name ,
            //   last_name ,
            //   email ,
            //   phone ,
            //   employee_code ,
            //   position ,
            //   department ,
            //   contact person ,
            //   biography

    /**
     * Get the validation rules that apply to the request.
     *
     * 
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required|string|max:1000',
            'image' =>'nullable|string',
            'user_id' =>'exists:users,id',
            'status' =>'required|boolean',
            'description' =>'nullable|string',
            'expire_date' =>'nullable|date|after:tomorrow'
        ];
    }
}
