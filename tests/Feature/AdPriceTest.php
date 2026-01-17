<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdPriceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_ad_without_price()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('ads.store'), [
            'title' => 'Ad without price',
            'description' => 'Description',
            'type' => 'offer',
            'category' => 'Usluge',
            'location' => 'Zagreb',
            'duration_days' => 7,
            // 'price' is intentionally missing to simulate disabled input
        ]);

        $response->assertRedirect(route('ads.index'));
        $this->assertDatabaseHas('ads', [
            'title' => 'Ad without price',
            'price' => null,
        ]);
    }

    public function test_can_create_ad_with_price()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('ads.store'), [
            'title' => 'Ad with price',
            'description' => 'Description',
            'type' => 'offer',
            'category' => 'Usluge',
            'location' => 'Zagreb',
            'duration_days' => 7,
            'price' => 100.50,
        ]);

        $response->assertRedirect(route('ads.index'));
        $this->assertDatabaseHas('ads', [
            'title' => 'Ad with price',
            'price' => 100.50,
        ]);
    }
}
