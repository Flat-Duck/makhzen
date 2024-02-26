@extends('layouts.app', ['page' => 'issue'])

@section('title',  trans('crud.issues.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.issues.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.issues.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                @include('admin.issues.form-inputs')
                                
                            </div>
                        </div>
                    </div>
                    <form
                        id="forms"
                        role="form"
                        method="POST"
                        action="{{ route('issues.update', $issue) }}"
                        enctype="multipart/form-data"                        
                        >
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="date" id="date" value="">
                        <input type="hidden" name="number" id="number" value="">
                               
                        <div class="card-footer text-end">
                            {{-- <button type="submit" class="btn btn-primary">
                                @lang('crud.common.update')
                            </button> --}}

                            <a
                                href="{{ route('issues.index') }}"
                                class="btn btn-default"
                            >
                                @lang('crud.common.back')
                            </a>
                            {{-- <a
                                href="{{ route('issues.create') }}"
                                class="btn btn-default"
                            >
                                @lang('crud.common.create')
                            </a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', () => {
    //     var dat = document.getElementById("date");
        
    //     var num = document.getElementById("num");
    //     const form = document.getElementById("forms");
    //     form.appendChild(el);
    
     });
     function updateHiddenInput() {
        let odate = document.getElementById("odate");
        let date = document.getElementById("date");
        date.value = odate.value;
        
        let onumber = document.getElementById("onumber");
        let number = document.getElementById("number");
        number.value = onumber.value;
    }
</script>

@endpush