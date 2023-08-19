<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Invoice::class);

        $search = $request->get('search', '');

        $invoices = Invoice::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.invoices.index', compact('invoices', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Invoice::class);

        return view('admin.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Invoice::class);

        $validated = $request->validated();

        $invoice = Invoice::create($validated);

        return redirect()
            ->route('invoices.edit', $invoice)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Invoice $invoice): View
    {
        $this->authorize('view', $invoice);

        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Invoice $invoice): View
    {
        $this->authorize('update', $invoice);

        return view('admin.invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        InvoiceUpdateRequest $request,
        Invoice $invoice
    ): RedirectResponse {
        $this->authorize('update', $invoice);

        $validated = $request->validated();

        $invoice->update($validated);

        return redirect()
            ->route('invoices.edit', $invoice)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Invoice $invoice
    ): RedirectResponse {
        $this->authorize('delete', $invoice);

        $invoice->delete();

        return redirect()
            ->route('invoices.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
