<?php

namespace Tests\Feature;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdMessagingTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_send_message_to_ad_owner()
    {
        $owner = User::factory()->create();
        $ad = Ad::factory()->create([
            'user_id' => $owner->id,
            'title' => 'Test Ad',
            'description' => 'Test Description',
            'is_anonymous' => true,
        ]);

        $sender = User::factory()->create();

        $response = $this->actingAs($sender)->post(route('messages.store'), [
            'ad_id' => $ad->id,
            'content' => 'Hello, I am interested in your ad.',
        ]);

        $response->assertSessionHas('status', 'Poruka je uspješno poslana!');

        $this->assertDatabaseHas('messages', [
            'ad_id' => $ad->id,
            'sender_id' => $sender->id,
            'recipient_id' => $owner->id,
            'content' => 'Hello, I am interested in your ad.',
        ]);
    }

    public function test_user_cannot_message_own_ad()
    {
        $owner = User::factory()->create();
        $ad = Ad::factory()->create([
            'user_id' => $owner->id,
        ]);

        $response = $this->actingAs($owner)->post(route('messages.store'), [
            'ad_id' => $ad->id,
            'content' => 'Self message',
        ]);

        $response->assertSessionHasErrors('content');
        $this->assertDatabaseMissing('messages', ['content' => 'Self message']);
    }

    public function test_ad_page_shows_markdown_description()
    {
        $user = User::factory()->create();
        $ad = Ad::factory()->create([
            'user_id' => $user->id,
            'description' => '**Bold Text** and *Italic*',
        ]);

        $response = $this->get(route('ads.show', $ad->id));

        $response->assertStatus(200);
        $response->assertSee('<strong>Bold Text</strong>', false);
        $response->assertSee('<em>Italic</em>', false);
    }

    public function test_ad_page_shows_contact_form_for_others()
    {
        $owner = User::factory()->create();
        $ad = Ad::factory()->create(['user_id' => $owner->id]);
        $viewer = User::factory()->create();

        $response = $this->actingAs($viewer)->get(route('ads.show', $ad->id));

        $response->assertSee('Pošalji poruku');
        $response->assertSee('action="'.route('messages.store').'"', false);
    }
}
