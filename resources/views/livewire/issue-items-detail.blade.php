<div>
    <div class="mb-4">
        @can('create', App\Models\Item::class)
        <button class="btn btn-primary" wire:click="newItem">
            <i class="ti ti-plus"></i>
            @lang('crud.common.attach')
        </button>
        @endcan
    </div>

    <x-modal id="invoice-items-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    aria-label="Close"
                    data-bs-dismiss="modal"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="item_id"
                            label="{{trans('crud.items.create_title')}}"
                            wire:model="item_id"
                        >
                            <option value="null" disabled>Please select the Item</option>
                            @foreach($itemsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="quantity"
                            label="{{trans('crud.items.inputs.quantity')}}"
                            wire:model="quantity"
                            max="255"
                            placeholder="{{trans('crud.items.inputs.quantity')}}"
                        ></x-inputs.number>
                    </x-inputs.group>
                </div>
            </div>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn me-auto"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="ti ti-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="ti ti-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('crud.invoice_items.inputs.item_id')</th>
                    <th>@lang('crud.invoice_items.inputs.quantity')</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoiceItems as $k=> $item)
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->code ?? '-' }}</td>
                    <td>{{ $item->required->quantity ?? '-' }}</td>
                    <td>
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('delete-any', App\Models\Item::class)
                            <button
                                class="btn btn-danger"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                wire:click="detach({{ $item->id }})"
                            >
                                <i class="ti ti-trash"></i>
                                @lang('crud.common.detach')
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if( $invoiceItems->hasPages() )
    <div class="card-footer pb-0">{{ $invoiceItems->links() }}</div>
    @endif
</div>
