@php $editing = isset($invoice) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="number"
        label="Number"
        :value="old('number', ($editing ? $invoice->number : ''))"
        max="255"
        placeholder="Number"
        required
    ></x-inputs.number>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="type" label="Type">
        @php $selected = old('type', ($editing ? $invoice->type : '')) @endphp
        <option value="صادر" {{ $selected == 'صادر' ? 'selected' : '' }} >صادر</option>
        <option value="وارد" {{ $selected == 'وارد' ? 'selected' : '' }} >وارد</option>
        <option value="تالف" {{ $selected == 'تالف' ? 'selected' : '' }} >تالف</option>
    </x-inputs.select>
</x-inputs.group>
