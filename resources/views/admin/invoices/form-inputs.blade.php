@php $editing = isset($invoice) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="number"
        label="{{trans('crud.invoices.inputs.number')}}"
        :value="old('number', ($editing ? $invoice->number : ''))"
        max="255"
        placeholder="{{trans('crud.invoices.inputs.number')}}"
        required
    ></x-inputs.number>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="type" label="{{trans('crud.invoices.inputs.type')}}">
        @php $selected = old('type', ($editing ? $invoice->type : '')) @endphp
        <option value="صادر" {{ $selected == 'صادر' ? 'selected' : '' }} ></option>
        <option value="وارد" {{ $selected == 'وارد' ? 'selected' : '' }} ></option>
        <option value="تالف" {{ $selected == 'تالف' ? 'selected' : '' }} ></option>
    </x-inputs.select>
</x-inputs.group>
