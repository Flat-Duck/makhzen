@php $editing = isset($item) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="code"
        label="Code"
        :value="old('code', ($editing ? $item->code : ''))"
        maxlength="255"
        placeholder="Code"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="type"
        label="Type"
        :value="old('type', ($editing ? $item->type : ''))"
        maxlength="255"
        placeholder="Type"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="color"
        label="Color"
        :value="old('color', ($editing ? $item->color : ''))"
        maxlength="9"
        placeholder="Color"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="quantity"
        label="Quantity"
        :value="old('quantity', ($editing ? $item->quantity : ''))"
        max="255"
        placeholder="Quantity"
        required
    ></x-inputs.number>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.textarea
        name="description"
        label="Description"
        maxlength="255"
        required
        >{{ old('description', ($editing ? $item->description : ''))
        }}</x-inputs.textarea
    >
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.date
        name="ex_date"
        label="Ex Date"
        value="{{ old('ex_date', ($editing ? optional($item->ex_date)->format('Y-m-d') : '')) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>
