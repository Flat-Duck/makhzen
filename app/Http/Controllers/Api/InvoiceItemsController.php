<?php
namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemCollection;

class InvoiceItemsController extends Controller
{
    public function index(Request $request, Invoice $invoice): ItemCollection
    {
        $this->authorize('view', $invoice);

        $search = $request->get('search', '');

        $items = $invoice
            ->items()
            ->search($search)
            ->latest()
            ->paginate();

        return new ItemCollection($items);
    }

    public function store(
        Request $request,
        Invoice $invoice,
        Item $item
    ): Response {
        $this->authorize('update', $invoice);

        $invoice->items()->syncWithoutDetaching([$item->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Invoice $invoice,
        Item $item
    ): Response {
        $this->authorize('update', $invoice);

        $invoice->items()->detach($item);

        return response()->noContent();
    }
}
