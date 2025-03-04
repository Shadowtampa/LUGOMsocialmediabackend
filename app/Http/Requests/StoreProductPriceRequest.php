<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StoreProductPriceRequest",
 *     required={"product_id", "price", "start_date"},
 *     @OA\Property(property="product_id", type="integer", example=1),
 *     @OA\Property(property="price", type="number", format="float", example=1999.99),
 *     @OA\Property(property="start_date", type="string", format="date", example="2025-02-19"),
 *     @OA\Property(property="end_date", type="string", format="date", nullable=true, example="2025-03-19")
 * )
 */
class StoreProductPriceRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }
}
