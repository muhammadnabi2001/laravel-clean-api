<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'        => 'Mahsulot nomini kiritish majburiy.',
            'name.string'          => 'Mahsulot nomi matn ko‘rinishida bo‘lishi kerak.',
            'name.max'             => 'Mahsulot nomi :max belgidan oshmasligi kerak.',

            'price.required'       => 'Narxni kiritish majburiy.',
            'price.integer'        => 'Narx faqat butun son bo‘lishi kerak.',
            'price.min'            => 'Narx manfiy bo‘lishi mumkin emas.',

            'stock.required'       => 'Soni (stock) majburiy maydon.',
            'stock.integer'        => 'Soni (stock) faqat butun son bo‘lishi kerak.',
            'stock.min'            => 'Soni (stock) manfiy bo‘la olmaydi.',

            'description.string'   => 'Tavsif (description) faqat matn bo‘lishi kerak.',
        ];
    }
}
