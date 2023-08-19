<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Issue;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IssueTest extends TestCase
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
    public function it_gets_issues_list(): void
    {
        $issues = Issue::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.issues.index'));

        $response->assertOk()->assertSee($issues[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_issue(): void
    {
        $data = Issue::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.issues.store'), $data);

        $this->assertDatabaseHas('issues', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.issues.update', $issue), $data);

        $data['id'] = $issue->id;

        $this->assertDatabaseHas('issues', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_issue(): void
    {
        $issue = Issue::factory()->create();

        $response = $this->deleteJson(route('api.issues.destroy', $issue));

        $this->assertModelMissing($issue);

        $response->assertNoContent();
    }
}
