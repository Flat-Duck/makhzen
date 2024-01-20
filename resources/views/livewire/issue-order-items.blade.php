<div class="row">
    <x-inputs.group class="col-sm-6">
        <x-inputs.select
            name="item_id"
            label="{{trans('crud.orders.name')}}"
            wire:model="order_id"
            wire:change="id_change">
            <option value="null" disabled>الرجاء اختيار طلب لصرفه</option>
            @foreach($itemsForSelect as $value => $label)
                <option value="{{ $value }}"  >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
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
                    <th>@lang('crud.common.operations')</th>
                </tr>
            </thead>
            <tbody>
                 @forelse($items as $k=> $item)
                 <tr :key="itemer_{{ $k }}">
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>{{ $item->code ?? '-' }}</td>
                    <td>{{ $item->type ?? '-' }}</td>
                    <td>{{ $item->quantity ?? '-' }}</td>
                    <td>{{ $item->required->quantity ?? '-' }}</td>
                    <td>
                        <input type="number" class="form-control" id="item_{{$k}}" wire:model="issued_items.{{ $item->id }}.issued_quantity" />
                    </td>
                    <td>
                        <div role="group" aria-label="Row Actions" class="d-flex" >                            
                            <a href="#"
                            {{-- {{ route('time-sheets.fill', $employee) }}" --}}
                            data-bs-original-title="Fill Time Sheet"
                            data-bs-placement="top"
                            data-bs-toggle="tooltip"
                            class="btn btn-icon btn-outline-success ms-1" >
                        <i class="ti ti-calendar"></i>
                    </a>
                        </div>
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
</div>