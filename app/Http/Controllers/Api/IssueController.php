<?php

namespace App\Http\Controllers\Api;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\IssueResource;
use App\Http\Resources\IssueCollection;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueUpdateRequest;

class IssueController extends Controller
{
    public function index(Request $request): IssueCollection
    {
        $this->authorize('view-any', Issue::class);

        $search = $request->get('search', '');

        $issues = Issue::search($search)
            ->latest()
            ->paginate();

        return new IssueCollection($issues);
    }

    public function store(IssueStoreRequest $request): IssueResource
    {
        $this->authorize('create', Issue::class);

        $validated = $request->validated();

        $issue = Issue::create($validated);

        return new IssueResource($issue);
    }

    public function show(Request $request, Issue $issue): IssueResource
    {
        $this->authorize('view', $issue);

        return new IssueResource($issue);
    }

    public function update(
        IssueUpdateRequest $request,
        Issue $issue
    ): IssueResource {
        $this->authorize('update', $issue);

        $validated = $request->validated();

        $issue->update($validated);

        return new IssueResource($issue);
    }

    public function destroy(Request $request, Issue $issue): Response
    {
        $this->authorize('delete', $issue);

        $issue->delete();

        return response()->noContent();
    }
}
