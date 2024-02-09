<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Milon\Barcode\DNS1D;

class Barcode extends Component
{
    public $data;
    public $editing;
    public $item;
    public $code;

    protected $rules = [
        'code' => ['numeric', 'digits_between:1,12','unique:items,code'],
    ];



    public function mount(): void
    {
        if ($this->editing)
        {
            $this->code =  $this->item->code;
        }
    }

    public function render()
    { 
      
        return view('livewire.barcode');
    }
    public function code_change()
    {
        $this->validate();//('code', ['code' =>'unique:items,code','numeric', 'max:12']);
    }
}
