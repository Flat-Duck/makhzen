<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Office;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_offices(): void
    {
        $offices = Office::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('offices.index'));

        $response
            ->assertOk()
            ->assertViewIs('admin.offices.index')
            ->assertViewHas('offices');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_office(): void
    {
        $response = $this->get(route('offices.create'));

        $response->assertOk()->assertViewIs('admin.offices.create');
    }

    /**
     * @test
     */
    public function it_stores_the_office(): void
    {
        $data = Office::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('offices.store'), $data);

        $this->assertDatabaseHas('offices', $data);

        $office = Office::latest('id')->first();

        $response->assertRedirect(route('offices.edit', $office));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_office(): void
    {
        $office = Office::factory()->create();

        $response = $this->get(route('offices.show', $office));

        $response
            ->assertOk()
            ->assertViewIs('admin.offices.show')
            ->assertViewHas('office');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_office(): void
    {
        $office = Office::factory()->create();

        $response = $this->get(route('offices.edit', $office));

        $response
            ->assertOk()
            ->assertViewIs('admin.offices.edit')
            ->assertViewHas('office');
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

        $response = $this->put(route('offices.update', $office), $data);

        $data['id'] = $office->id;

        $this->assertDatabaseHas('offices', $data);

        $response->assertRedirect(route('offices.edit', $office));
    }

    /**
     * @test
     */
    public function it_deletes_the_office(): void
    {
        $office = Office::factory()->create();

        $response = $this->delete(route('offices.destroy', $office));

        $response->assertRedirect(route('offices.index'));

        $this->assertModelMissing($office);
    }
}
