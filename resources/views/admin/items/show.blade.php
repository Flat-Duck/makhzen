@extends('layouts.app', ['page' => 'item'])

@section('title',  trans('crud.items.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.items.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.items.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('items.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.items.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.items.inputs.code')</h5>
                                <span>{{ $item->code ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.items.inputs.type')</h5>
                                <span>{{ $item->type ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.items.inputs.color')</h5>
                                <span>{{ $item->color ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.items.inputs.quantity')</h5>
                                <span>{{ $item->quantity ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.items.inputs.description')</h5>
                                <span>{{ $item->description ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.items.inputs.ex_date')</h5>
                                <span>{{ $item->ex_date ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('items.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Item::class)
                                <a
                                    href="{{ route('items.create') }}"
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
            </div>
            @endsection
        </div>
    </div>
</div>
