@extends('layouts.app', ['page' => 'order'])

@section('title',  trans('crud.orders.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.orders.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.orders.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('orders.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.orders.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.orders.inputs.number')</h5>
                                <span>{{ $order->number ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.orders.inputs.office_id')</h5>
                                <span
                                    >{{ optional($order->office)->name ?? '-'
                                    }}</span
                                >
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.orders.inputs.user_id')</h5>
                                <span
                                    >{{ optional($order->created_by)->name ??
                                    '-' }}</span
                                >
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('orders.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Order::class)
                                <a
                                    href="{{ route('orders.create') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-add"></i>
                                    @lang('crud.common.create')
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

                @can('view-any', App\Models\item_order::class)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title w-100 mb-2">Items</h4>

                        <livewire:order-items-detail :order="$order" />
                    </div>
                </div>
                @endcan
            </div>
            @endsection
        </div>
    </div>
</div>
