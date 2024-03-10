@php $editing = isset($order) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="number"
        label="{{trans('crud.orders.inputs.number')}}"
        :value="old('number', ($editing ? $order->number : ''))"
        
        placeholder="{{trans('crud.orders.inputs.number')}}"
        required
    ></x-inputs.text>
</x-inputs.group>
<x-inputs.group class="col-sm-12">
    <x-inputs.text
        readonly
        name="created_at"
        label="{{trans('crud.orders.inputs.created_at')}}"
        :value="old('created_at', ($editing ? $order->created_at : now()->format('Y-m-d')))"
        
        placeholder="{{trans('crud.orders.inputs.created_at')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="office_id" label="{{trans('crud.orders.inputs.office_id')}}" required>
        @php $selected = old('office_id', ($editing ? $order->office_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>الرجاء اختيار المكتب</option>
        @foreach($offices as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group>

{{-- <x-inputs.group class="col-sm-12">
    <x-inputs.select name="user_id" label="{{trans('crud.orders.inputs.user_id')}}" required>
        @php $selected = old('user_id', ($editing ? $order->user_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>  الرجاء اختيار المستخدم</option>
        @foreach($users as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group> --}}
