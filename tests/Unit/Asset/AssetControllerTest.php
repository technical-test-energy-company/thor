<?php

namespace Tests\Unit\Asset;

use App\Asset\Asset;
use App\Asset\AssetService;
use Illuminate\Pagination\CursorPaginator;
use Infrastructure\Http\Requests\IndexRequest;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

final class AssetControllerTest extends TestCase
{
    // AssetController.index
    public function test_asset_index_returns_empty_array_when_no_results_found(): void
    {
        // given
        $route = '/api/assets';
        $paginator = new CursorPaginator(
            items: collect([]),
            perPage: IndexRequest::DEFAULT_LIMIT,
            cursor: null
        );

        $this->mock(AssetService::class, function ($mock) use ($paginator): void {
            $mock->shouldReceive('index')->once()->andReturn($paginator);
        });

        // when
        $response = $this->get($route);

        // then
        $response->assertJson([]);
        $response->assertOk();
    }

    public function test_asset_index_returns_all_found_items_when_found(): void
    {
        // given
        $route = '/api/assets';
        $items = collect(Asset::factory()->count(2)->make());
        $paginator = new CursorPaginator(
            items: $items,
            perPage: IndexRequest::DEFAULT_LIMIT,
            cursor: null
        );

        $this->mock(AssetService::class, function ($mock) use ($paginator): void {
            $mock->shouldReceive('index')->once()->andReturn($paginator);
        });

        // when
        $response = $this->get($route);

        // then
        $response->assertJson($paginator->toArray());
        $response->assertJsonCount(2, 'data');
        $response->assertOk();
    }

    // AssetController.store
    public function test_asset_store_should_return_new_asset_when_created(): void
    {
        // given
        $route = '/api/assets';
        $item = Asset::factory()->make();

        $this->mock(AssetService::class, function ($mock) use ($item): void {
            $mock->shouldReceive('store')->once()->andReturn($item);
        });

        // when
        $response = $this->post($route, $item->toArray());

        // then
        $response->assertJson($item->toArray());
        $response->assertCreated();
    }

    public function test_asset_store_should_throw_when_malformed_json_input(): void
    {
        // given
        $route = '/api/assets';
        $payload = [];

        // when
        $response = $this->post($route, $payload);

        // then
        $response->assertUnprocessable();
    }

    // AssetController.show
    public function test_asset_store_should_return_found_asset_when_exists(): void
    {
        // given
        $item = Asset::factory()->create();
        $id = $item->uid;
        $route = "/api/assets/$id";

        // when
        $response = $this->get($route);

        // then
        $response->assertJson($item->toArray());
        $response->assertOk();
    }

    public function test_asset_store_should_return_not_found_asset_when_it_does_not_exist(): void
    {
        // given
        $id = 1;
        $route = "/api/assets/$id";

        // when
        $response = $this->get($route);

        // then
        $response->assertNotFound();
    }

    // AssetController.update
    public function test_asset_update_should_update_when_fields_are_valid(): void
    {
        // given
        $item = Asset::factory()->create();
        $id = $item->uid;
        $route = "/api/assets/$id";
        $newItem = Asset::factory()->make();

        $this->mock(AssetService::class, function ($mock) use ($newItem): void {
            $mock->shouldReceive('update')->once()->andReturn($newItem);
        });

        // when
        $response = $this->put($route, $newItem->toArray());

        // then
        $response->assertJson($newItem->toArray());
        $response->assertOk();
    }

    #[DataProvider('assetUpdateDataProvider')]
    public function test_asset_update_should_throw_exception_when_fields_are_invalid($attribute, $value): void
    {
        // given
        $item = Asset::factory()->create();
        $id = $item->uid;
        $route = "/api/assets/$id";
        $payload = [$attribute => $value];

        // when
        $response = $this->put($route, $payload);

        // then
        $response->assertUnprocessable();
    }

    public function test_asset_update_should_return_not_found_asset_when_it_does_not_exist(): void
    {
        // given
        $id = 1;
        $route = "/api/assets/$id";
        $item = Asset::factory()->make();

        // when
        $response = $this->put($route, $item->toArray());

        // then
        $response->assertNotFound();
    }

    // AssetController.destroy
    public function test_asset_destroy_should_return_no_content_when_deleted(): void {
        // given
        $item = Asset::factory()->create();
        $id = $item->uid;
        $route = "/api/assets/$id";

        $this->mock(AssetService::class, function ($mock): void {
            $mock->shouldReceive('destroy')->once()->andReturn();
        });

        // when
        $response = $this->delete($route);

        // then
        $response->assertNoContent();
    }

    public function test_asset_destroy_should_return_not_found_asset_when_it_does_not_exist(): void {
        // given
        $id = 1;
        $route = "/api/assets/$id";

        // when
        $response = $this->delete($route);

        // then
        $response->assertNotFound();
    }

    public static function assetUpdateDataProvider(): array
    {
        return [
            ['name', null],
            ['description', null],
            ['device_type', 'non-existent-device-type'],
            ['ip_address', 'this-is-not-an-ip-address'],
            ['location', 'non-existent-country'],
            ['status', 'invalid-status'],
            ['supplier', null],
            ['risk', 'wow-very-high-risk'],
            ['risk_score', 500],
            ['risk_score', -1],
        ];
    }
}
