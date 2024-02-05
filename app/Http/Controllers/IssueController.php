<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueUpdateRequest;
use App\Models\Item;
use App\Models\Order;

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

        $orders = Order::whereNot('status', 'مصروفة')->get();
        return view('admin.issues.create', compact('orders'));
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

        $order = $issue->order;
        $items = $order->items;
        return view('admin.issues.edit', compact('issue', 'items'));
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
    
    public function issue_items(Request $request)
    {
        $order = Order::find($request->order_id);
        $item = Item::find($request->item_id);
        if ($item->quantity < $request->issued_quantity) {
            return redirect()->back()->withsErrors(__('الكمية الموجودة في المخزن غير كافية'));    
        }

        $required_item = $order->items()->where('id', $item->id)->first()->required;

        if (($required_item->issued_quantity + $request->issued_quantity) > $required_item->quantity) {
            //dd($required_item,$re);
            return redirect()->back()->withSuccess(__('لايمكن صرف كمية اكبر من الكمية المطلوبة'));    
        }


        \DB::table('item_order')->where(['order_id'=>$order->id, 'item_id'=> $request->item_id])
            ->increment('issued_quantity', $request->issued_quantity);

        //$order->items()->updateExistingPivot($request->item_id, ['issued_quantity' => $request->issued_quantity]);
        $item->decrement('quantity', $request->issued_quantity);

        $req = $order->items()->sum('item_order.quantity');
        $iss = $order->items()->sum('item_order.issued_quantity');
        if ($iss > 0 && $iss < $req) {
            $order->update(['status' => 'مصروفة جزئيا']);
        } else if ($iss > 0 && $iss == $req) {
            $order->update(['status' => 'مصروفة']);
        }

        return redirect()
            ->back()
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
