<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Collection;
use Livewire\Component;

class IssueOrderItems extends Component
{
    
    public Order $order;
     // public Item $item;
    public $itemsForSelect = [];
    public $issued_items = [];    
    public Collection $items;
    public $order_id = null;    
    public $quantity;

    protected $rules = [
        'issued_items.*.issued_quantity' => ['numeric']
    ];
    
    public function mount(): void
    {
        $this->items = collect();
        $this->issued_items = [];
        $this->itemsForSelect = Order::pluck('number', 'id');
          //  $this->resetItemData();
    }

    public function resetItemData(): void
    {
        // $this->order = new Order();

        // $this->order_id = null;
        // $this->quantity = null;

      //  $this->dispatchBrowserEvent('refresh');
    }

    public function update($id, $value )
    {
        dd($this->issued_items, $value);

    }
    public function id_change()
    {
        $this->order = Order::with('items')->find($this->order_id);
        $this->items = $this->order->items()->get();
        $this->issued_items = $this->items->pluck('qty','id');;
        // dd($this->items);
    }
    
    public function code_change()
    {
        $this->item_id = Item::where('code', $this->item_code)->first()->id;
    }
    public function render()
    {
        return view('livewire.issue-order-items');
    }
}
