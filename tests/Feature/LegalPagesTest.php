<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    public function test_privacy_page_can_be_rendered(): void
    {
        $response = $this->get(route('privacy'));

        $response->assertOk();
        $response->assertSee('Pravila privatnosti');
    }

    public function test_terms_page_can_be_rendered(): void
    {
        $response = $this->get(route('terms'));

        $response->assertOk();
        $response->assertSee('Uvjeti korištenja');
    }
}
