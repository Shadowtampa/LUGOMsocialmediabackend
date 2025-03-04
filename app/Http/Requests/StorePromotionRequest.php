<?php

namespace App\Http\Requests;

use App\Validation\Promotion\PromotionConfigValidatorFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

/**
 * @OA\Schema(
 *     schema="StorePromotionRequest",
 *     required={"name", "start_date", "promotion_type_id", "config"},
 *     @OA\Property(property="name", type="string", example="Desconto Fixo R$ 50"),
 *     @OA\Property(property="description", type="string", nullable=true, example="Desconto fixo de R$ 50 em compras acima de R$ 200"),
 *     @OA\Property(property="start_date", type="string", format="date", example="2025-02-19"),
 *     @OA\Property(property="end_date", type="string", format="date", nullable=true, example="2025-03-19"),
 *     @OA\Property(property="promotion_type_id", type="integer", example=2),
 *     @OA\Property(
 *         property="config",
 *         type="object",
 *         example={
 *             "discount_amount": 50.00,
 *             "min_purchase_amount": 200.00
 *         }
 *     )
 * )
 */
class StorePromotionRequest extends FormRequest
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
            'promotion_type_id' => 'required|exists:promotion_types,id',
            'config' => 'required|json', // Garante que o campo seja um JSON válido
        ];
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
