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
}
