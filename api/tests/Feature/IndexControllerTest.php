<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    private const URL = "/api/doc";

    public function testIfDocumentationResourceReturnsStatusOk()
    {
        $response = $this->json("GET", self::URL);

        $response->assertStatus(200);
    }

    public function testIfDocumentationResourceReturnsView()
    {
        $response = $this->json("GET", self::URL);

        $response->assertViewIs('index');
    }
}
