<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberValidationTest extends TestCase
{
    /** @test */
    public function a_message_can_contain_two_digit_maximum()
    {
        $data = [
            "message" => "12 this is my number"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(0);
    }

    /** @test */
    public function a_message_can_contain_two_digit_maximum_but_cannot_stay_0_and_1_together()
    {
        $data = [
            "message" => "01 this is my number"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_can_contain_two_digit_maximum_but_cannot_stay_0_and_1_together_in_words_also()
    {
        $data = [
            "message" => "zero one this is my number"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_can_contain_two_digit_maximum_but_cannot_stay_0_and_1_together_in_combination_of_number_and_words_also()
    {
        $data = [
            "message" => "zero 1 this is my number"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function if_a_message_contain_a_full_number_it_will_be_blocked()
    {
        $data = [
            "message" => "0183159166"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }
}
