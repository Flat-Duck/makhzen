<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueUpdateRequest;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Issue::class);

        $search = $request->get('search', '');

        $issues = Issue::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.issues.index', compact('issues', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Issue::class);

        return view('admin.issues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IssueStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Issue::class);

        $validated = $request->validated();

        $issue = Issue::create($validated);

        return redirect()
            ->route('issues.edit', $issue)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Issue $issue): View
    {
        $this->authorize('view', $issue);

        return view('admin.issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Issue $issue): View
    {
        $this->authorize('update', $issue);

        return view('admin.issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        IssueUpdateRequest $request,
        Issue $issue
    ): RedirectResponse {
        $this->authorize('update', $issue);

        $validated = $request->validated();

        $issue->update($validated);

        return redirect()
            ->route('issues.edit', $issue)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Issue $issue): RedirectResponse
    {
        $this->authorize('delete', $issue);

        $issue->delete();

        return redirect()
            ->route('issues.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
