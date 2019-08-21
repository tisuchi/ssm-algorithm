<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SSMFormValidationTest extends TestCase
{
    /** @test */
    public function the_message_field_is_required_for_testing()
    {
        $data = [
            'message' => ''
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(302);
    }

    /** @test */
    public function multiple_line_of_messages_can_be_passed()
    {
        $data = [
            "message" => "I am here for something. <br> Can I do something else also?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
    }

    /** @test */
    public function a_single_line_of_message_can_be_passed()
    {
        $data = [
            "message" => "I am here for something."
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
    }
}
