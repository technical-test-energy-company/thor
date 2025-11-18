<?php

namespace Tests\Feature\Asset;

use App\Asset\Asset;
use App\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Infrastructure\Constants\Constants;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AssetFeatureTest extends TestCase
{
    use RefreshDatabase;

    private const BASE_ROUTE = '/api/assets/';

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Sanctum::actingAs($this->user);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_asset_feature_test_should_create_read_update_and_delete(): void
    {
        // index - check empty database
        $response_index_1 = $this->get(self::BASE_ROUTE);
        $response_index_1->assertJson([]);

        // store - create first item
        $item_store_1 = Asset::factory()->make([Constants::PUBLIC_ID => 's46']);
        $id_store_1 = $item_store_1->uid;
        $response_store_1 = $this->post(self::BASE_ROUTE, $item_store_1->toArray());
        $response_store_1->assertJson($item_store_1->toArray());

        // show - retrieve first item
        $response_show_1 = $this->get(self::BASE_ROUTE.$id_store_1);
        $response_show_1->assertJson($item_store_1->toArray());

        // store - create second item
        $item_store_2 = Asset::factory()->make([Constants::PUBLIC_ID => 's47']);
        $id_store_2 = $item_store_2->uid;
        $response_store_2 = $this->post(self::BASE_ROUTE, $item_store_2->toArray());
        $response_store_2->assertJson($item_store_2->toArray());

        // index - check both created items
        $response_index_2 = $this->get(self::BASE_ROUTE);
        $response_index_2->assertJsonCount(2, 'data');

        // update - change name of first item
        $name_update_1 = 'Alpha';
        $payload_update_1 = ['name' => $name_update_1];
        $response_update_1 = $this->put(self::BASE_ROUTE.$id_store_1, $payload_update_1);
        $response_update_1->assertJsonFragment($payload_update_1);

        // show - retrieve updated first item
        $response_show_2 = $this->get(self::BASE_ROUTE.$id_store_1);
        $response_show_2->assertJsonFragment($payload_update_1);

        // delete - delete second item
        $response_destroy_1 = $this->delete(self::BASE_ROUTE.$id_store_2);
        $response_destroy_1->assertNoContent();

        // index - check database with only one item
        $response_index_3 = $this->get(self::BASE_ROUTE);
        $response_index_3->assertJsonCount(1, 'data');
    }
}
