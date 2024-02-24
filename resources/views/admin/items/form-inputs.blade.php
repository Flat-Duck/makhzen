@php $editing = isset($item) @endphp


<livewire:barcode :editing="$editing" :item="$editing ? $item : null" />

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
    <x-inputs.select name="type" label="{{trans('crud.items.inputs.type')}}">
        @php $selected = old('type', ($editing ? $item->type : '')) @endphp
        <option value="مواد كهربائية" {{ $selected == 'مواد كهربائية' ? 'selected' : '' }} >مواد كهربائية</option>
        <option value="مواد قرطاسية" {{ $selected == 'مواد قرطاسية' ? 'selected' : '' }} >مواد قرطاسية</option>
        <option value="مواد صحية" {{ $selected == 'مواد صحية' ? 'selected' : '' }} >مواد صحية</option>
        <option value="مواد فنية" {{ $selected == 'مواد فنية' ? 'selected' : '' }} >مواد فنية</option>
    </x-inputs.select>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="color" label="{{trans('crud.items.inputs.color')}}">
        @php $selected = old('color', ($editing ? $item->color : '')) @endphp
        <option value="احمر" {{ $selected == 'احمر' ? 'selected' : '' }} >احمر</option>
        <option value="اسود" {{ $selected == 'اسود' ? 'selected' : '' }} >اسود</option>
        <option value="اخضر" {{ $selected == 'اخضر' ? 'selected' : '' }} >اخضر</option>
        <option value="اصفر" {{ $selected == 'اصفر' ? 'selected' : '' }} >اصفر</option>
        <option value="ازرق" {{ $selected == 'ازرق' ? 'selected' : '' }} >ازرق</option>
        <option value="بني" {{ $selected == 'بني' ? 'selected' : '' }} >بني</option>        
    </x-inputs.select>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="quantity"
        label="{{trans('crud.items.inputs.quantity')}}"
        :value="old('quantity', ($editing ? $item->quantity : ''))"        
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
        value="{{ old('ex_date', ($editing ? optional($item->ex_date)->format('Y-m-d') : now()->format('Y-m-d'))) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>
