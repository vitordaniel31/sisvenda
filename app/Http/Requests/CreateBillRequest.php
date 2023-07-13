<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'payment_method_id'   =>  ['required', 'integer', 'exists:payment_methods,id'],
            'value' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0.01']
        ];
    }
}
