<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OfficeStoreRequest;
use App\Http\Requests\OfficeUpdateRequest;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Office::class);

        $search = $request->get('search', '');

        $offices = Office::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.offices.index', compact('offices', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Office::class);

        return view('admin.offices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Office::class);

        $validated = $request->validated();

        $office = Office::create($validated);

        return redirect()
            ->route('offices.edit', $office)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Office $office): View
    {
        $this->authorize('view', $office);

        return view('admin.offices.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Office $office): View
    {
        $this->authorize('update', $office);

        return view('admin.offices.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        OfficeUpdateRequest $request,
        Office $office
    ): RedirectResponse {
        $this->authorize('update', $office);

        $validated = $request->validated();

        $office->update($validated);

        return redirect()
            ->route('offices.edit', $office)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Office $office): RedirectResponse
    {
        $this->authorize('delete', $office);

        $office->delete();

        return redirect()
            ->route('offices.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
