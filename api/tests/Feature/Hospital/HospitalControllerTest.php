<?php

namespace Tests\Feature\Hospital;

use App\Domain\Hospital\Hospital;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HospitalControllerTest extends TestCase
{
    /*
     * use RefreshDatabase;
     */

    private const BASE_URI = "api/hospital";

    public function testGetAllHospitalIsSuccessfully()
    {
        $response = $this->json("GET", self::BASE_URI);

        $response->assertJson([]);
        $response->assertStatus(200);
    }

    public function testFindHospitalIsSuccessfully()
    {
        $faker = factory(Hospital::class)->create();
        $faker = $faker->first();

        $response = $this->json("GET", sprintf("%s/%i", self::BASE_URI, $faker->id));

        $data = json_decode($response->getContent());

        $this->assertEquals($faker->id, $data[0]->id);
        $this->assertEquals($faker->name, $data[0]->name);
        $this->assertEquals($faker->address, $data[0]->address);
        $this->assertEquals($faker->city, $data[0]->city);

        $response->isSuccessful();
    }

    public function testStoreHospitalIsSuccessfully()
    {
        $response = $this->json("POST", self::BASE_URI, [
            "name" => "test",
            "city" => "city",
            "address" => "street 17"
        ]);

        $data = json_decode($response->getContent());

        $this->assertEquals("test", $data->name);
        $this->assertEquals("street 17", $data->address);
        $this->assertEquals("city", $data->city);

        $response->isSuccessful();
    }
}
