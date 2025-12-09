<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
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
            'per_page'   => 'sometimes|integer|min:1|max:100',
            'sort_by'    => 'sometimes|string|in:id,name,price,stock',
            'sort_order' => 'sometimes|string|in:asc,desc',
        ];
    }

    public function messages(): array
    {
        return [
            'per_page.integer' => 'per_page faqat butun son bo‘lishi kerak',
            'per_page.min' => 'per_page kamida 1 bo‘lishi kerak',
            'per_page.max' => 'per_page maksimal 100 bo‘lishi mumkin',
            'sort_by.in' => 'sort_by faqat ruxsat etilgan fieldlardan bo‘lishi kerak',
            'sort_order.in' => 'sort_order asc yoki desc bo‘lishi kerak',
        ];
    }
}
