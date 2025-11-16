<?php

namespace Tests\Unit\Asset;

use App\Asset\Asset;
use App\Asset\AssetService;
use Illuminate\Pagination\CursorPaginator;
use Infrastructure\Http\Requests\IndexRequest;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class AssetControllerTest extends TestCase
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
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([]);
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
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonCount(2, 'data');
        $response->assertJson($paginator->toArray());
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
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson($item->toArray());
    }

    public function test_asset_store_should_throw_when_malformed_json_input(): void
    {
        // given
        $route = '/api/assets';
        $payload = [];

        // when
        $response = $this->post($route, $payload);

        // then
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
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
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($item->toArray());
    }

    public function test_asset_store_should_return_not_found_asset_when_does_not_exist(): void
    {
        // given
        $id = 1;
        $route = "/api/assets/$id";

        // when
        $response = $this->get($route);

        // then
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
