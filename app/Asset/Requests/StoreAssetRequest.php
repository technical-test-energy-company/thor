<?php

namespace App\Asset\Requests;

use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetRisk;
use App\Asset\Enums\AssetStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAssetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'device_type' => ['required', Rule::enum(AssetDeviceType::class)],
            'ip_address' => 'required|ipv4',
            'location' => 'required|string|size:2|uppercase',
            'status' => ['required', Rule::enum(AssetStatus::class)],
            'supplier' => 'required|string|max:100',
            'risk' => ['required', Rule::enum(AssetRisk::class)],
            'risk_score' => 'required|decimal:2',
        ];
    }
}
