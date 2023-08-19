<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Invoice;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoiceItemsDetail extends Component
{
    use AuthorizesRequests;

    public Invoice $invoice;
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

    public function mount(Invoice $invoice): void
    {
        $this->invoice = $invoice;
        $this->itemsForSelect = Item::pluck('code', 'id');
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
        $this->modalTitle = trans('crud.invoice_items.new_title');
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

        $this->invoice->items()->attach($this->item_id, [
            'quantity' => $this->quantity,
        ]);

        $this->hideModal();
    }

    public function detach($item): void
    {
        $this->authorize('delete-any', Item::class);

        $this->invoice->items()->detach($item);

        $this->resetItemData();
    }

    public function render(): View
    {
        return view('livewire.invoice-items-detail', [
            'invoiceItems' => $this->invoice
                ->items()
                ->withPivot(['quantity'])
                ->paginate(20),
        ]);
    }
}
