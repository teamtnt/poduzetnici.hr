<?php

namespace Tests\Feature;

use Tests\TestCase;

class FacebookDataDeletionTest extends TestCase
{
    public function test_data_deletion_page_can_be_rendered(): void
    {
        $response = $this->get(route('facebook.data-deletion'));

        $response->assertOk();
        $response->assertSee('Zahtjev za brisanje korisničkih podataka');
    }
}
