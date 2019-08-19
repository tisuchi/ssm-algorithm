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


}
