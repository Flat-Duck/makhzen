<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Order;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderItemsDetail extends Component
{
    use AuthorizesRequests;

    public Order $order;
    public Item $item;
    public $itemsForSelect = [];
    public $item_id = null;
    public $quantity;

    public $showingModal = false;
    public $modalTitle = 'New Item';

    protected $rules = [
        'item_id' => ['required', 'exists:items,id'],
        'quantity' => ['required', 'numeric'],
    ];

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->itemsForSelect = Item::pluck('name', 'id');
        $this->resetItemData();
    }

    public function resetItemData(): void
    {
        $this->item = new Item();

        $this->item_id = null;
        $this->quantity = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newItem(): void
    {
        $this->modalTitle = trans('crud.order_items.new_title');
        $this->resetItemData();

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        $this->authorize('create', Item::class);

        $this->order->items()->attach($this->item_id, [
            'quantity' => $this->quantity,
        ]);

        $this->hideModal();
    }

    public function detach($item): void
    {
        $this->authorize('delete-any', Item::class);

        $this->order->items()->detach($item);

        $this->resetItemData();
    }

    public function render(): View
    {
        return view('livewire.order-items-detail', [
            'orderItems' => $this->order
                ->items()
                ->withPivot(['quantity'])
                ->paginate(20),
        ]);
    }
}
