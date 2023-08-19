<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Issue;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IssueControllerTest extends TestCase
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
    public function it_displays_index_view_with_issues(): void
    {
        $issues = Issue::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('issues.index'));

        $response
            ->assertOk()
            ->assertViewIs('admin.issues.index')
            ->assertViewHas('issues');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_issue(): void
    {
        $response = $this->get(route('issues.create'));

        $response->assertOk()->assertViewIs('admin.issues.create');
    }

    /**
     * @test
     */
    public function it_stores_the_issue(): void
    {
        $data = Issue::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('issues.store'), $data);

        $this->assertDatabaseHas('issues', $data);

        $issue = Issue::latest('id')->first();

        $response->assertRedirect(route('issues.edit', $issue));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_issue(): void
    {
        $issue = Issue::factory()->create();

        $response = $this->get(route('issues.show', $issue));

        $response
            ->assertOk()
            ->assertViewIs('admin.issues.show')
            ->assertViewHas('issue');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_issue(): void
    {
        $issue = Issue::factory()->create();

        $response = $this->get(route('issues.edit', $issue));

        $response
            ->assertOk()
            ->assertViewIs('admin.issues.edit')
            ->assertViewHas('issue');
    }

    /**
     * @test
     */
    public function it_updates_the_issue(): void
    {
        $issue = Issue::factory()->create();

        $data = [
            'date' => $this->faker->date(),
        ];

        $response = $this->put(route('issues.update', $issue), $data);

        $data['id'] = $issue->id;

        $this->assertDatabaseHas('issues', $data);

        $response->assertRedirect(route('issues.edit', $issue));
    }

    /**
     * @test
     */
    public function it_deletes_the_issue(): void
    {
        $issue = Issue::factory()->create();

        $response = $this->delete(route('issues.destroy', $issue));

        $response->assertRedirect(route('issues.index'));

        $this->assertModelMissing($issue);
    }
}
