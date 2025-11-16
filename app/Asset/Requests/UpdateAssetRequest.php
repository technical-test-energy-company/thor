<?php

namespace App\Asset\Requests;

use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Infrastructure\Enums\RiskSeverity;

class UpdateAssetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'filled|string|max:100',
            'description' => 'filled|string|max:255',
            'device_type' => ['filled', Rule::enum(AssetDeviceType::class)],
            'ip_address' => 'filled|ipv4',
            'location' => 'filled|string|size:2|uppercase',
            'status' => ['filled', Rule::enum(AssetStatus::class)],
            'supplier' => 'filled|string|max:100',
            'risk' => ['filled', Rule::enum(RiskSeverity::class)],
            'risk_score' => 'filled|decimal:0,2|min:0|max:1',
        ];
    }
}
