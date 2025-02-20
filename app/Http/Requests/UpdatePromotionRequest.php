<?php

namespace App\Http\Requests;

use App\Validation\Promotion\PromotionConfigValidatorFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdatePromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Garante que apenas usuários autenticados possam criar produtos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'promotion_type_id' => 'nullable|exists:promotion_types,id',
            'config' => 'nullable|json', // Garante que o campo seja um JSON válido
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
        $data['promotion_id'] = $this->route('id');

        return $data;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(), // Garante que o produto pertence ao usuário autenticado
        ]);
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $data = $this->all();

            // Se o campo config estiver ausente ou vazio
            if (!isset($data['config']) || empty($data['config'])) {
                $validator->errors()->add('config', 'O campo config é obrigatório e deve ser um JSON válido.');
                return;
            }

            // Tenta decodificar JSON com erro tratado
            try {
                $config = json_decode($data['config'], true, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                $validator->errors()->add('config', 'O campo config deve ser um JSON válido: ' . $e->getMessage());
                return;
            }

            // Validação dinâmica baseada no tipo da promoção
            $promotionValidator = PromotionConfigValidatorFactory::make($data['promotion_type_id']);

            if ($promotionValidator) {
                $promotionValidator->validate($config, $validator);
            }
        });
    }
}
