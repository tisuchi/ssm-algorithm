<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SocialMediaTest extends TestCase
{
    /** @test */
    public function a_message_can_easily_pass_without_passing_any_social_media_name()
    {
        $data = [
            "message" => "Hello, how are you today?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(0);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_related_to_facebook()
    {
        $data = [
            "message" => "What is your facebook id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_facebook_in_short()
    {
        $data = [
            "message" => "What is your fb id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_twitter()
    {
        $data = [
            "message" => "What is your twitter id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_meetme()
    {
        $data = [
            "message" => "What is your meetme id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_googleplus()
    {
        $data = [
            "message" => "What is your googleplus id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_myspace()
    {
        $data = [
            "message" => "What is your myspace id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_tagged()
    {
        $data = [
            "message" => "What is your tagged id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_twoo()
    {
        $data = [
            "message" => "What is your twoo id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_instagram()
    {
        $data = [
            "message" => "What is your instagram id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_insta()
    {
        $data = [
            "message" => "What is your insta id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_likealittle()
    {
        $data = [
            "message" => "What is your likealittle id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_snapchat()
    {
        $data = [
            "message" => "What is your snapchat id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_wechat()
    {
        $data = [
            "message" => "What is your wechat id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_messanger()
    {
        $data = [
            "message" => "What is your messanger id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_whatsapp()
    {
        $data = [
            "message" => "What is your whatsapp id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_skype()
    {
        $data = [
            "message" => "What is your skype id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_e_mai_l()
    {
        $data = [
            "message" => "What is your e.mai.l id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_emai_l()
    {
        $data = [
            "message" => "What is your emai.l id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_em_ai_l()
    {
        $data = [
            "message" => "What is your em.ai.l id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_e_m_a_i_l()
    {
        $data = [
            "message" => "What is your e.m.i.l id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_viber()
    {
        $data = [
            "message" => "What is your viber id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_line()
    {
        $data = [
            "message" => "What is your line id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_bbm()
    {
        $data = [
            "message" => "What is your bbm id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_kik()
    {
        $data = [
            "message" => "What is your kik id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_qq()
    {
        $data = [
            "message" => "What is your qq id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_linne()
    {
        $data = [
            "message" => "What is your linne id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_ig()
    {
        $data = [
            "message" => "What is your ig id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_li_ne()
    {
        $data = [
            "message" => "What is your li.ne id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_we_cht()
    {
        $data = [
            "message" => "What is your we.cht id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_wc()
    {
        $data = [
            "message" => "What is your wc id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_wheecht()
    {
        $data = [
            "message" => "What is your wheecht id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_sk_ype()
    {
        $data = [
            "message" => "What is your sk.ype id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_wchat()
    {
        $data = [
            "message" => "What is your wchat id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_wcht()
    {
        $data = [
            "message" => "What is your wcht id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_wct()
    {
        $data = [
            "message" => "What is your wct id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_weecht()
    {
        $data = [
            "message" => "What is your weecht id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_vchat()
    {
        $data = [
            "message" => "What is your vchat id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_imo()
    {
        $data = [
            "message" => "What is your imo id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_kakaotalk()
    {
        $data = [
            "message" => "What is your kakaotalk id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_微信()
    {
        $data = [
            "message" => "What is your 微信 id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_微博()
    {
        $data = [
            "message" => "What is your 微博 id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_面子书()
    {
        $data = [
            "message" => "What is your 面子书 id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_面书()
    {
        $data = [
            "message" => "What is your 面书 id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

    /** @test */
    public function a_message_canno_contain_any_keyword_推特()
    {
        $data = [
            "message" => "What is your 推特 id?"
        ];

        $response = $this->post('/add', $data);

        $response->assertStatus(200);
        $response->assertSee(1);
    }

}
