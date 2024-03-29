@php $editing = isset($issue) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.date
        name="date"
        label="Date"
        value="{{ old('date', ($editing ? optional($issue->date)->format('Y-m-d') : now()->format('Y-m-d'))) }}"
        
        required
    ></x-inputs.date>
</x-inputs.group>
