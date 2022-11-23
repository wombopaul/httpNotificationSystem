<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_a_subscription()
    {
        $response = $this->post('/api/subscribe/topic1', [
            'url' => 'http://127.0.0.1:9000/api'
        ]);

        $response->assertStatus(200);
    }
}
