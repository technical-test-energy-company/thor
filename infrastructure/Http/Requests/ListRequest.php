<?php

namespace Infrastructure\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    private const DEFAULT_LIMIT = 100;

    protected function prepareForValidation(): void
    {
        $this->merge([
            'limit' => $this->query('limit', self::DEFAULT_LIMIT),
        ]);
    }

    public function rules(): array
    {
        return [
            'limit' => 'integer|min:1',
            'cursor' => 'string|nullable',
        ];
    }
}
