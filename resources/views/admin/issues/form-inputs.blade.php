@php $editing = isset($issue) @endphp

@if ($editing)
<x-inputs.group class="col-sm-4">
    <x-inputs.date
        name="odate"
        label="{{trans('crud.issues.inputs.date')}}"
        value="{{ old('date', ($editing ? optional($issue->date)->format('Y-m-d') : '')) }}"
        max="255"
        onchange="updateHiddenInput()"
        required
    ></x-inputs.date>
</x-inputs.group>
<x-inputs.group class="col-sm-4">
    <x-inputs.number    
    name="onumber"
    label="{{trans('crud.issues.inputs.number')}}"
    :value="old('number', ($editing ? $issue->number : ''))"
    placeholder="{{trans('crud.issues.inputs.number')}}"
    required
    onchange="updateHiddenInput()"
    ></x-inputs.number>
</x-inputs.group>
@else
<x-inputs.group class="col-sm-4">
    <x-inputs.date
        name="date"
        label="{{trans('crud.issues.inputs.date')}}"
        value="{{ old('date', ($editing ? optional($issue->date)->format('Y-m-d') : '')) }}"
        max="255"
        onchange="updateHiddenInput()"
        required
    ></x-inputs.date>
</x-inputs.group>
<x-inputs.group class="col-sm-4">
    <x-inputs.number    
    name="number"
    label="{{trans('crud.issues.inputs.number')}}"
    :value="old('number', ($editing ? $issue->number : ''))"
    placeholder="{{trans('crud.issues.inputs.number')}}"
    required
    onchange="updateHiddenInput()"
    ></x-inputs.number>
</x-inputs.group>
@endif
@if ($editing)
    <x-inputs.group class="col-sm-4">
        <x-inputs.text
            readonly
            name="department"
            label="القسم"
            value="{{ $issue->order->office->name }}" >
        </x-inputs.text>
    </x-inputs.group>
    
    <x-inputs.group class="col-sm-4">
        <x-inputs.text
            readonly
            name="order_id"
            label="رقم طلب القسم"
            value="{{ $issue->order->number }}">
        </x-inputs.text>
    </x-inputs.group>
    
    <x-inputs.group class="col-sm-4">
        <x-inputs.text
            readonly
            name="status"
            label="حالة الطلب"
            value="{{ $issue->order->status }}">
        </x-inputs.text>
    </x-inputs.group>
    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('crud.items.inputs.name')</th>
                    <th>@lang('crud.items.inputs.code')</th>
                    <th>@lang('crud.items.inputs.type')</th>
                    <th>@lang('crud.items.inputs.existing_quantity')</th>
                    <th>@lang('crud.items.inputs.required_quantity')</th>
                    <th>@lang('crud.items.inputs.issued_quantity')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $k=> $item)
                    <tr>
                    
                        <td>{{ $k+1 }}</td>
                        <td>{{ $item->name ?? '-' }}</td>
                        <td>{{ $item->code ?? '-' }}</td>
                        <td>{{ $item->type ?? '-' }}</td>
                        <td>{{ $item->quantity ?? '-' }}</td>
                        <td>{{ $item->required->quantity ?? '-' }}</td>
                        <td>
                            <form action="{{route('issues.items')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$item->id}}" name="item_id">
                                <input type="hidden" value="{{$item->required->order_id}}" name="order_id">
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="issued_quantity" placeholder="الكمية المراد صرفها"
                                    value="{{ $item->required->issued_quantity ?? '0' }}"/>
                                    <button type="submit"
                                    data-bs-original-title="صرف الكمية "
                                    data-bs-placement="top"
                                    data-bs-toggle="tooltip"
                                    class="btn btn-icon btn-outline-success">
                                    صرف
                                </button>
                                  </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            @lang('crud.common.no_items_found')
                        </td>
                    </tr>
                @endforelse 
            </tbody>
        </table>
    </div>
@else
    <x-inputs.group class="col-sm-4">
        <x-inputs.select
            name="order_id"
            label="{{trans('crud.issues.inputs.order_id')}}">        
                <option value="null" selected disabled>الرجاء اختيار طلب لصرفه</option>
                @foreach($orders as $k => $order)
                    <option value="{{ $order->id }}">{{ $order->number }} | {{$order->office->name}} | {{$order->status}}</option>
                @endforeach
        </x-inputs.select>
    </x-inputs.group>
@endif