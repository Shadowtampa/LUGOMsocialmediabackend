<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Garante que apenas usu�rios autenticados possam criar produtos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        ];
    }

    /**
     * Get all the input and files for the request.
     *
     * @param  array|null  $keys
     * @return array
     */
    public function all($keys = null): array
    {
        $data                 = parent::all();
        $data['product_id'] = $this->route('id');

        return $data;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(), // Garante que o produto pertence ao usu�rio autenticado
        ]);
    }
}
