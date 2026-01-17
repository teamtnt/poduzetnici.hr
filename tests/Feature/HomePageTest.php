<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_shows_tools_card_link(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Alati');
        $response->assertSee('/alati');
    }
}
