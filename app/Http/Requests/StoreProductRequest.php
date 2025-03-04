<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StoreProductRequest",
 *     required={"name", "condition", "available"},
 *     @OA\Property(property="name", type="string", example="Smartphone XYZ"),
 *     @OA\Property(property="description", type="string", nullable=true, example="Smartphone de última geração"),
 *     @OA\Property(property="condition", type="string", enum={"new", "used"}, example="new"),
 *     @OA\Property(property="available", type="boolean", example=true),
 *     @OA\Property(property="image", type="string", format="binary", nullable=true)
 * )
 */
class StoreProductRequest extends FormRequest
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
            'condition' => 'required|in:new,used',
            'available' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Imagem opcional
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
}
