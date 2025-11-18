<?php

namespace Tests\Unit\Asset;

use App\Asset\Asset;
use App\Asset\AssetService;
use App\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Infrastructure\Constants\Constants;
use Infrastructure\Http\Requests\IndexRequest;
use Tests\TestCase;

class AssetServiceTest extends TestCase
{
    use RefreshDatabase;

    private AssetService $assetService;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->assetService = app(AssetService::class);
        $this->user = User::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    // AssetService.index
    public function test_asset_index_returns_empty_array_when_no_results_found(): void
    {
        // given

        // when
        $response = $this->assetService->index(['limit' => IndexRequest::DEFAULT_LIMIT]);

        // then
        $this->assertCount(0, $response->items());
    }

    public function test_asset_index_returns_all_found_items_when_found(): void
    {
        // given
        Asset::factory()->count(3)->create();

        // when
        $response = $this->assetService->index(['limit' => IndexRequest::DEFAULT_LIMIT]);

        // then
        $this->assertCount(3, $response->items());
    }

    // AssetService.store
    public function test_asset_store_should_store_and_return_new_asset_when_created(): void
    {
        // given
        $item = Asset::factory()->make([Constants::PUBLIC_ID => 's4']);

        // when
        $response = $this->assetService->store($item->toArray());

        // then
        $this->assertEquals($item->toArray(), $response->toArray());
        $this->assertDatabaseHas(Asset::TABLE_NAME, $response->toArray());
    }

    // AssetService.show
    public function test_asset_update_should_update_and_return_new_asset_when_updated(): void
    {
        // given
        $original = Asset::factory()->create();
        $item = Asset::factory()->make();

        // when
        $response = $this->assetService->update($item->toArray(), $original);

        // then
        $this->assertEquals($item->toArray(), $response->toArray());
        $this->assertDatabaseHas(Asset::TABLE_NAME, $response->toArray());
    }

    // AssetService.destroy
    public function test_asset_destroy_should_delete_succesfully(): void
    {
        // given
        $asset = Asset::factory()->create();

        // when
        $this->assetService->destroy($asset, $this->user);

        // then
        $this->assertSoftDeleted(Asset::TABLE_NAME, $asset->toArray());
    }
}
