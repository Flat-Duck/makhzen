@extends('layouts.app', ['page' => 'dashboard'])
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="row g-2">
                            <div class="col">
                                <h3 class="card-title">الاصناف ذات صلاحية شارفت على الانتهاء [{{ \App\Models\Item::expiring()->count()}}]</h3>
                            </div>
                        </div>
                    </div>
                    <div class="divide-y-2 mt-4">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('crud.items.inputs.name')</th>
                                        <th>@lang('crud.items.inputs.quantity')</th>
                                        <th>@lang('crud.items.inputs.ex_date')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (\App\Models\Item::expiring() as $k => $item )
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $item->name ?? '-' }}</td>
                                        <td>{{ $item->quantity ?? '-' }}</td>
                                        <td>{{ $item->ex_date->format('Y/m/d') ?? '-' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', () => {
        print();
    
     });     
</script>

@endpush