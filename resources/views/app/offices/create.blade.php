@extends('layouts.app', ['page' => 'office'])

@section('title',  trans('crud.offices.create_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.offices.create_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="POST"
                    action="{{ route('offices.store') }}"
                    class="card"
                >
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.offices.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('app.offices.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.create')
                        </button>

                        <a
                            href="{{ route('offices.index') }}"
                            class="btn btn-default"
                            >@lang('crud.common.back')</a
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
