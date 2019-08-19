<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MobileValidationTest extends TestCase
{
    /** @test */
    public function validate_malaysian_regular_mobile_number()
    {
        $data = [
            "message" => "0183159166"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_bangladeshi_regular_mobile_number()
    {
        $data = [
            "message" => "01310919000"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_malaysian_regular_mobile_number_with_iso_code()
    {
        $data = [
            "message" => "+60183159166"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_bangladeshi_regular_mobile_number_with_iso_code()
    {
        $data = [
            "message" => "+8801310919000"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_mobile_number_with_words()
    {
        $data = [
            "message" => "zero one eight three one five nine one six six"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_mobile_number_by_combination_of_words_and_number()
    {
        $data = [
            "message" => "zero one eight three one five nine one 66"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_mobile_number_using_forword_slash()
    {
        $data = [
            "message" => "/zero /one /eight /three /one /five /nine /one /six /six"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_mobile_number_using_backword_slash()
    {
        $data = [
            "message" => "\zero \one \eight \three \one \five \nine \one \six \six"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function validate_mobile_number_using_quote()
    {
        $data = [
            "message" => "'zero 'one 'eight 'three 'one 'five 'nine 'one 'six 'six"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

}
