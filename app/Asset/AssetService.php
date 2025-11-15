<?php

namespace App\Asset;

use Illuminate\Pagination\CursorPaginator;
use Infrastructure\Constants\Constants;

class AssetService
{
    public function index($data): CursorPaginator
    {
        $limit = $data['limit'];
        $response = Asset::orderBy(Constants::ID)->cursorPaginate($limit);

        return $response;
    }

    public function store($data): Asset
    {
        $asset = Asset::create($data);

        return $asset;
    }

    public function update($data, Asset $asset): Asset
    {
        $asset->updateOrFail($data);

        return $asset->fresh();
    }

    public function destroy(Asset $asset): void
    {
        $asset->deleteOrFail();
    }
}
