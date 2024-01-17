@extends('layouts.app', ['page' => 'invoice'])

@section('title',  trans('crud.invoices.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.invoices.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="POST"
                    action="{{ route('invoices.update', $invoice) }}"
                    enctype="multipart/form-data"
                    class="card"
                >
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.invoices.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('admin.invoices.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.update')
                        </button>

                        <a
                            href="{{ route('invoices.index') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.back')
                        </a>
                        {{-- <a
                            href="{{ route('invoices.create') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.create')
                        </a> --}}
                    </div>
                </form>

                @can('view-any', App\Models\invoice_item::class)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title w-100 mb-2">{{trans('crud.invoice_items.name')}}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:invoice-items-detail :invoice="$invoice" />
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('item_id'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
@endpush
