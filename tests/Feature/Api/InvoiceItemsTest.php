<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Item;
use App\Models\Invoice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceItemsTest extends TestCase
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
    public function it_gets_invoice_items(): void
    {
        $invoice = Invoice::factory()->create();
        $item = Item::factory()->create();

        $invoice->items()->attach($item);

        $response = $this->getJson(route('api.invoices.items.index', $invoice));

        $response->assertOk()->assertSee($item->code);
    }

    /**
     * @test
     */
    public function it_can_attach_items_to_invoice(): void
    {
        $invoice = Invoice::factory()->create();
        $item = Item::factory()->create();

        $response = $this->postJson(
            route('api.invoices.items.store', [$invoice, $item])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $invoice
                ->items()
                ->where('items.id', $item->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_items_from_invoice(): void
    {
        $invoice = Invoice::factory()->create();
        $item = Item::factory()->create();

        $response = $this->deleteJson(
            route('api.invoices.items.store', [$invoice, $item])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $invoice
                ->items()
                ->where('items.id', $item->id)
                ->exists()
        );
    }
}
