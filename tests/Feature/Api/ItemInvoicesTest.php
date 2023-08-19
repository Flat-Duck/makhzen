<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Item;
use App\Models\Invoice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemInvoicesTest extends TestCase
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
    public function it_gets_item_invoices(): void
    {
        $item = Item::factory()->create();
        $invoice = Invoice::factory()->create();

        $item->invoices()->attach($invoice);

        $response = $this->getJson(route('api.items.invoices.index', $item));

        $response->assertOk()->assertSee($invoice->id);
    }

    /**
     * @test
     */
    public function it_can_attach_invoices_to_item(): void
    {
        $item = Item::factory()->create();
        $invoice = Invoice::factory()->create();

        $response = $this->postJson(
            route('api.items.invoices.store', [$item, $invoice])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $item
                ->invoices()
                ->where('invoices.id', $invoice->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_invoices_from_item(): void
    {
        $item = Item::factory()->create();
        $invoice = Invoice::factory()->create();

        $response = $this->deleteJson(
            route('api.items.invoices.store', [$item, $invoice])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $item
                ->invoices()
                ->where('invoices.id', $invoice->id)
                ->exists()
        );
    }
}
