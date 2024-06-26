<?php

namespace App\Http\Requests\vendor;

use Illuminate\Foundation\Http\FormRequest;

class AddVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'user_name'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'id_no'=>'required|unique:users,id_no',
            'phone'=>'unique:users,phone',
            'password'=>'required',
        ];
    }
}
