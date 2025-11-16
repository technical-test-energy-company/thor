<?php

namespace App\Asset;

use App\Asset\Requests\StoreAssetRequest;
use App\Asset\Requests\UpdateAssetRequest;
use Dedoc\Scramble\Attributes\QueryParameter;
use Infrastructure\Http\Controllers\Controller;
use Infrastructure\Http\Requests\IndexRequest;
use Symfony\Component\HttpFoundation\Response;

class AssetController extends Controller
{
    private AssetService $assetService;

    public function __construct(AssetService $assetService)
    {
        $this->assetService = $assetService;
    }

    /**
     * List all available Assets.
     *
     * @response array{data: Asset[], path: string, per_page: int, next_cursor: string|null, next_page_url: string|null, prev_cursor: string|null, prev_page_url: string|null}|array{}
     */
    #[QueryParameter('limit', default: IndexRequest::DEFAULT_LIMIT)]
    public function index(IndexRequest $request): Response
    {
        $data = $request->validated();
        $response = $this->assetService->index($data);

        return response($response);
    }

    /**
     * Create a new asset.
     */
    public function store(StoreAssetRequest $request): Response
    {
        $data = $request->validated();
        $response = $this->assetService->store($data);

        /**
         * @status 201
         *
         * @body Asset
         */
        return response($response, Response::HTTP_CREATED);
    }

    /**
     * Retrieve an Asset.
     */
    public function show(Asset $asset): Response
    {
        return response($asset);
    }

    /**
     * Update an Asset.
     */
    public function update(UpdateAssetRequest $request, Asset $asset): Response
    {
        $data = $request->validated();
        $response = $this->assetService->update($data, $asset);

        /**
         * @body Asset
         */
        return response($response);
    }

    /**
     * Delete an Asset.
     */
    public function destroy(Asset $asset): Response
    {
        $this->assetService->destroy($asset);

        return response()->noContent();
    }
}
