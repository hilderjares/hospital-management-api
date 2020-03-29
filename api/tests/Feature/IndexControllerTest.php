<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    private const URI = "/api/doc";

    public function testIfDocumentationResourceReturnsStatusOk()
    {
        $response = $this->json("GET", self::URI);

        $response->assertStatus(200);
    }

    public function testIfDocumentationResourceReturnsMessage()
    {
        $response = $this->json("GET", self::URI);

        $response->assertExactJson([
            "message" => "documentation",
        ]);
    }
}
