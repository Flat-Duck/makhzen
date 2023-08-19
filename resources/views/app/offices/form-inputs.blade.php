@php $editing = isset($office) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="Name"
        :value="old('name', ($editing ? $office->name : ''))"
        maxlength="255"
        placeholder="Name"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="phone"
        label="Phone"
        :value="old('phone', ($editing ? $office->phone : ''))"
        maxlength="255"
        placeholder="Phone"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="location"
        label="Location"
        :value="old('location', ($editing ? $office->location : ''))"
        maxlength="255"
        placeholder="Location"
        required
    ></x-inputs.text>
</x-inputs.group>
