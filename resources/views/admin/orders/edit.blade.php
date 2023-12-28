@extends('layouts.app', ['page' => 'order'])

@section('title',  trans('crud.orders.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.orders.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="POST"
                    action="{{ route('orders.update', $order) }}"
                    enctype="multipart/form-data"
                    class="card"
                >
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.orders.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('admin.orders.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.update')
                        </button>

                        <a
                            href="{{ route('orders.index') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.back')
                        </a>
                        {{-- <a
                            href="{{ route('orders.create') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.create')
                        </a> --}}
                    </div>
                </form>

                @can('view-any', App\Models\item_order::class)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title w-100 mb-2">Items</h4>
                    </div>
                    <div class="card-body">
                        <livewire:order-items-detail :order="$order" />
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
