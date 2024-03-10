@php $editing = isset($invoice) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="number"
        label="{{trans('crud.invoices.inputs.number')}}"
        :value="old('number', ($editing ? $invoice->number : ''))"
        placeholder="{{trans('crud.invoices.inputs.number')}}"
        required
    ></x-inputs.number>
</x-inputs.group>



<input type="hidden" name="type" value="{{old('type', ($editing ? $invoice->type : $type))}}"/>

@if($type=='تالف')
    <x-inputs.group class="col-sm-4">
        <x-inputs.date
        name="date"
        label="{{trans('crud.issues.inputs.date')}}"
        value="{{ old('date', ($editing ? optional($invoice->date)->format('Y-m-d') : now()->format('Y-m-d'))) }}"
        required
        readonly
        ></x-inputs.date>
    </x-inputs.group>
@else
    <x-inputs.group class="col-sm-4">
        <x-inputs.date
        name="date"
        label="{{trans('crud.issues.inputs.date')}}"
        value="{{ old('date', ($editing ? optional($invoice->date)->format('Y-m-d') : now()->format('Y-m-d'))) }}"        
        required
        ></x-inputs.date>
    </x-inputs.group>
@endif
{{-- <x-inputs.group class="col-sm-12">
    <x-inputs.select name="type" label="{{trans('crud.invoices.inputs.type')}}">
        @php $selected = old('type', ($editing ? $invoice->type : '')) @endphp
        <option value="صادر" {{ $selected == 'صادر' ? 'selected' : '' }} >صادر</option>
        <option value="وارد" {{ $selected == 'وارد' ? 'selected' : '' }} >وارد</option>
        <option value="تالف" {{ $selected == 'تالف' ? 'selected' : '' }} >تالف</option>
    </x-inputs.select>
</x-inputs.group> --}}
