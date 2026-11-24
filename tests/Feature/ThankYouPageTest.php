<?php

namespace Tests\Feature;

use Tests\TestCase;

class ThankYouPageTest extends TestCase
{
    public function test_direct_visit_redirects_to_contact_page(): void
    {
        $this->get(route('thank-you'))->assertRedirect(route('contact'));
    }

    public function test_shows_message_after_successful_submission(): void
    {
        $this->withSession(['contact_success' => 'Thanks, we will be in touch.'])
            ->get(route('thank-you'))
            ->assertOk()
            ->assertSee('Thanks, we will be in touch.');
    }
}
