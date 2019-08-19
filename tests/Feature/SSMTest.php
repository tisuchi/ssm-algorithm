<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SSMTest extends TestCase
{
    /** @test */
    public function a_visitor_is_able_to_see_the_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_tester_should_able_to_see_create_message_page()
    {
        $response = $this->get('/add');

        $response->assertStatus(200);
        $response->assertViewIs('create');
    }

    /** @test */
    public function a_tester_should_able_to_submit_a_message()
    {
        $data = [
            'message' => 'Hello world'
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
    }
}
