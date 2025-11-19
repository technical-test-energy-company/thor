<?php

namespace Infrastructure\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public const DEFAULT_LIMIT = 100;

    protected function prepareForValidation(): void
    {
        $this->merge([
            'limit' => $this->query('limit', self::DEFAULT_LIMIT),
        ]);
    }

    public function rules(): array
    {
        return [
            'limit' => 'integer|nullable|min:1',
            'cursor' => 'string|nullable',
        ];
    }
}
