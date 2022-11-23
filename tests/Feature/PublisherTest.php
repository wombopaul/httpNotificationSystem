<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublisherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_publish_a_topic()
    {
        $response = $this->post('/api/publish/topic1', [
            'msg' => 'A test message'
        ]);

        $response->assertStatus(200);
    }
}
