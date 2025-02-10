<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'query' => ['nullable', 'string', 'max:55'],
            'price' => ['nullable', 'array', 'size:2'],
            'price.0' => ['nullable', 'integer', 'min:0', 'max:1000000'],
            'price.1' => ['nullable', 'integer', 'min:0', 'max:1000000', 'gte:price.0'],
            'bedrooms' => ['nullable', 'integer', 'max:100'],
            'bathrooms' => ['nullable', 'integer', 'max:100'],
            'storeys' => ['nullable', 'integer', 'max:100'],
            'garages' => ['nullable', 'integer', 'max:100'],
            'page_limit' => ['required', 'integer', 'min:5', 'max:100'],
            'page' => ['required', 'integer', 'min:1', 'max:100'],
        ];
    }
}
