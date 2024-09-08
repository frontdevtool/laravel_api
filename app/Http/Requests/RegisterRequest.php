<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)

    {
        if ($this->is('api/*')) {
            $response = ApiResponse::sendResponse(422, ' validation error', $validator->getMessageBag()->all());
        }
        // return 22222222222;
        throw new ValidationException($validator, $response);
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
            'name' => 'required',
            'email' => ['required','unique:'. User::class],
            'password' => 'required',
        ];
    }



    public function attributes()
    {
        return [
            'email' => 'email address',
            'name' => 'first_Name',
            'password' => 'My_password',
        ];
        
    }
}
