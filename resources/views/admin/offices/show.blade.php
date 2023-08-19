@extends('layouts.app', ['page' => 'office'])

@section('title',  trans('crud.offices.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.offices.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.offices.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('offices.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.offices.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.offices.inputs.name')</h5>
                                <span>{{ $office->name ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.offices.inputs.phone')</h5>
                                <span>{{ $office->phone ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.offices.inputs.location')</h5>
                                <span>{{ $office->location ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('offices.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Office::class)
                                <a
                                    href="{{ route('offices.create') }}"
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
