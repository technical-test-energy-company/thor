<?php

namespace App\Asset;

use App\User\User;
use App\Vulnerability\Vulnerability;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\Log;
use Infrastructure\Constants\Constants;
use Infrastructure\Enums\RiskSeverity;

class AssetService
{
    public function index(array $data): CursorPaginator
    {
        $limit = $data['limit'];
        $response = Asset::orderBy(Constants::ID)->cursorPaginate($limit);

        return $response;
    }

    public function store(array $data): Asset
    {
        $asset = Asset::create($data);

        return $asset;
    }

    public function update(array $data, Asset $asset): Asset
    {
        $asset->updateOrFail($data);

        return $asset->fresh();
    }

    public function destroy(Asset $asset, User $user): void
    {
        $asset->deleteOrFail();

        $userId = $user->id;
        $assetId = $asset->id;
        $message = "User with id $userId deleted Asset with id $assetId";
        Log::notice($message);
    }

    public function calculateRisk(Asset $asset): Asset
    {
        $vulnerabilities = Vulnerability::where(Asset::FOREIGN_ID, $asset->uid)->get();

        $riskScore = $this->getRiskScore($vulnerabilities);
        $severity = RiskSeverity::fromRiskScore($riskScore);

        $data = [
            'risk' => $severity,
            'risk_score' => $riskScore,
        ];
        $updated = $this->update($data, $asset);

        return $updated;
    }

    private function getRiskScore(Collection $vulnerabilities): float
    {
        $riskScore = 0.0;
        $riskWeight = 0;

        $vulnerabilities->each(function ($vulnerability) use (&$riskScore, &$riskWeight): void {
            $score = $vulnerability->cvss / RiskSeverity::SCORE_NORMALIZATION_DIVISOR;
            $weight = RiskSeverity::WEIGHTS[$vulnerability->severity->value];

            $riskScore += $score * $weight;
            $riskWeight += $weight;
        });

        $result = round($riskScore / $riskWeight, 2);

        return $result;
    }
}
