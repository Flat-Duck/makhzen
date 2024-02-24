<div class="row">
    <x-inputs.group class="col-sm-5">
        <x-inputs.number
            name="code"
            wire:model="code"
            wire:change="code_change"
            label="{{trans('crud.items.inputs.code')}}"
            :value="old('code', ($editing ? $item->code : ''))"
            placeholder="{{trans('crud.items.inputs.code')}}"
            required>
        </x-inputs.number>
    </x-inputs.group>
    <x-inputs.group class="col-sm-3 mt-5">
        <label class="form-selectgroup-item">
            <input type="radio" wire:confirm="ok?" wire:click="random_digits(12)"  class="form-selectgroup-input">
            <span class="form-selectgroup-label">باركود</span>
        </label>
    </x-inputs.group>
    <x-inputs.group class="col-sm-4 mt-5">
        @if($code)
        <div>{!! DNS1D::getBarcodeHTML($code, 'C128') !!}</div>
        @endif
    </x-inputs.group>
</div>