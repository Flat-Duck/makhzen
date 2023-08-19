<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Office;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_offices_list(): void
    {
        $offices = Office::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.offices.index'));

        $response->assertOk()->assertSee($offices[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_office(): void
    {
        $data = Office::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.offices.store'), $data);

        $this->assertDatabaseHas('offices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_office(): void
    {
        $office = Office::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'location' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.offices.update', $office), $data);

        $data['id'] = $office->id;

        $this->assertDatabaseHas('offices', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_office(): void
    {
        $office = Office::factory()->create();

        $response = $this->deleteJson(route('api.offices.destroy', $office));

        $this->assertModelMissing($office);

        $response->assertNoContent();
    }
}
