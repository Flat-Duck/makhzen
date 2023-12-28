@php $editing =isset($office) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="{{trans('crud.offices.inputs.name')}}"
        :value="old('name', ($editing ? $office->name : ''))"
        maxlength="255"
        placeholder="{{trans('crud.offices.inputs.name')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="phone"
        label="{{trans('crud.offices.inputs.phone')}}"
        :value="old('phone', ($editing ? $office->phone : ''))"
        maxlength="10"
        placeholder="{{trans('crud.offices.inputs.phone')}}"
        required
    ></x-inputs.number>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="location"
        label="{{trans('crud.offices.inputs.location')}}"
        :value="old('location', ($editing ? $office->location : ''))"
        maxlength="255"
        placeholder="{{trans('crud.offices.inputs.location')}}"
        required
    ></x-inputs.text>
</x-inputs.group>
