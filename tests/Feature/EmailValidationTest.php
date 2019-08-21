<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailValidationTest extends TestCase
{
    /** @test */
    public function a_message_can_pass_without_having_any_email()
    {
        $data = [
            "message" => "I know you are good at programming."
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(0);
    }

    /** @test */
    public function a_message_cannot_pass_with_any_email()
    {
        $data = [
            "message" => "I know you are good at programming. Somehow, tisuchi@gmail.com is my email address."
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_detect_dot_format()
    {
        $data = [
            "message" => "t i s u c h i @ g m a i l dot com is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_at_the_rate_format()
    {
        $data = [
            "message" => "tisuchi @ gmail is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_at_the_rate_format_in_words()
    {
        $data = [
            "message" => "tisuchi [at] gmail is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_gmail_words()
    {
        $data = [
            "message" => "tisuchi gmail is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_yahoo_words()
    {
        $data = [
            "message" => "tisuchi yahoo is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_outlook_words()
    {
        $data = [
            "message" => "tisuchi outlook is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_hotmail_words()
    {
        $data = [
            "message" => "tisuchi hotmail is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_yandex_words()
    {
        $data = [
            "message" => "tisuchi yandex is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_email_words()
    {
        $data = [
            "message" => "tisuchi email is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_zoho_words()
    {
        $data = [
            "message" => "tisuchi zoho is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_mail_words()
    {
        $data = [
            "message" => "tisuchi mail is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_gmx_words()
    {
        $data = [
            "message" => "tisuchi gmx is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_protonmail_words()
    {
        $data = [
            "message" => "tisuchi protonmail is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_aol_words()
    {
        $data = [
            "message" => "tisuchi aol is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function it_will_detect_tutanota_words()
    {
        $data = [
            "message" => "tisuchi tutanota is my email address"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }
}
