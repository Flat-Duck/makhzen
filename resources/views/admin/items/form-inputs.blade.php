@php $editing = isset($item) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="code"
        label="{{trans('crud.items.inputs.code')}}"
        :value="old('code', ($editing ? $item->code : ''))"
        maxlength="255"
        placeholder="{{trans('crud.items.inputs.code')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="{{trans('crud.items.inputs.name')}}"
        :value="old('name', ($editing ? $item->name : ''))"
        maxlength="255"
        placeholder="{{trans('crud.items.inputs.name')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="type"
        label="{{trans('crud.items.inputs.type')}}"
        :value="old('type', ($editing ? $item->type : ''))"
        maxlength="255"
        placeholder="{{trans('crud.items.inputs.type')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="color"
        label="{{trans('crud.items.inputs.color')}}"
        :value="old('color', ($editing ? $item->color : ''))"
        maxlength="9"
        placeholder="{{trans('crud.items.inputs.color')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="quantity"
        label="{{trans('crud.items.inputs.quantity')}}"
        :value="old('quantity', ($editing ? $item->quantity : ''))"
        max="255"
        placeholder="{{trans('crud.items.inputs.quantity')}}"
        required
    ></x-inputs.number>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.textarea
        name="description"
        label="{{trans('crud.items.inputs.description')}}"
        maxlength="255"
        required
        >{{ old('description', ($editing ? $item->description : ''))
        }}</x-inputs.textarea
    >
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.date
        name="ex_date"
        label="{{trans('crud.items.inputs.ex_date')}}"
        value="{{ old('ex_date', ($editing ? optional($item->ex_date)->format('Y-m-d') : '')) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>
