<?php

namespace App\Asset;

use App\Asset\Requests\StoreAssetRequest;
use App\Asset\Requests\UpdateAssetRequest;
use Infrastructure\Http\Controllers\Controller;
use Infrastructure\Http\Requests\IndexRequest;
use Symfony\Component\HttpFoundation\Response;

class AssetController extends Controller
{
    private $assetService;

    public function __construct(AssetService $assetService)
    {
        $this->assetService = $assetService;
    }

    public function index(IndexRequest $request): Response
    {
        $data = $request->validated();
        $response = $this->assetService->index($data);

        return response($response);
    }

    public function store(StoreAssetRequest $request): Response
    {
        $data = $request->validated();
        $response = $this->assetService->store($data);

        return response($response, Response::HTTP_CREATED);
    }

    public function show(Asset $asset): Response
    {
        return response($asset);
    }

    public function update(UpdateAssetRequest $request, Asset $asset): Response
    {
        $data = $request->validated();
        $response = $this->assetService->update($data, $asset);

        return response($response);
    }

    public function destroy(Asset $asset): Response
    {
        $this->assetService->destroy($asset);

        return response()->noContent();
    }
}
