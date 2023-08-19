<?php
namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceCollection;

class ItemInvoicesController extends Controller
{
    public function index(Request $request, Item $item): InvoiceCollection
    {
        $this->authorize('view', $item);

        $search = $request->get('search', '');

        $invoices = $item
            ->invoices()
            ->search($search)
            ->latest()
            ->paginate();

        return new InvoiceCollection($invoices);
    }

    public function store(
        Request $request,
        Item $item,
        Invoice $invoice
    ): Response {
        $this->authorize('update', $item);

        $item->invoices()->syncWithoutDetaching([$invoice->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Item $item,
        Invoice $invoice
    ): Response {
        $this->authorize('update', $item);

        $item->invoices()->detach($invoice);

        return response()->noContent();
    }
}
