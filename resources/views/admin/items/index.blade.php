@extends('layouts.app', ['page' => 'crud.items.index_title'])

@section('title', trans('crud.items.index_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.items.index_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <form>
                        <div class="row g-2">
                            <div class="col">
                                <input
                                    id="indexSearch"
                                    name="search"
                                    placeholder="Searsh"
                                    value="{{ $search ?? '' }}"
                                    type="text"
                                    class="form-control"
                                    spellcheck="false"
                                    data-ms-editor="true"
                                    autocomplete="off"
                                />
                            </div>
                            <div class="col-auto">
                                <button
                                    class="btn btn-icon btn-primary"
                                    aria-label="Button"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path
                                            stroke="none"
                                            d="M0 0h24v24H0z"
                                            fill="none"
                                        ></path>
                                        <path
                                            d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"
                                        ></path>
                                        <path d="M21 21l-6 -6"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col-auto ms-auto d-print-none">
                        @can('create', App\Models\Item::class)
                        <a
                            data-bs-original-title="@lang('crud.common.create')"
                            data-bs-placement="top"
                            data-bs-toggle="tooltip"
                            class="pull-right btn btn-primary"
                            href="{{ route('items.create') }}"
                        >
                            <i class="ti ti-plus"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table
                    class="table"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('crud.items.inputs.name')</th>
                            <th>@lang('crud.items.inputs.code')</th>
                            <th>@lang('crud.items.inputs.type')</th>
                            <th>@lang('crud.items.inputs.color')</th>
                            <th>@lang('crud.items.inputs.quantity')</th>
                            <th>@lang('crud.items.inputs.description')</th>
                            <th>@lang('crud.items.inputs.ex_date')</th>
                            <th>@lang('crud.common.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $k=> $item)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $item->name ?? '-' }}</td>
                            <td>{{ $item->code ?? '-' }}</td>
                            <td>{{ $item->type ?? '-' }}</td>
                            <td>{{ $item->color ?? '-' }}</td>
                            <td>{{ $item->quantity ?? '-' }}</td>
                            <td>{{ $item->description ?? '-' }}</td>
                            <td>{{ $item->ex_date ?? '-' }}</td>
                            <td>
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="d-flex"
                                >
                                    @can('update', $item)
                                    <a
                                        href="{{ route('items.edit', $item) }}"
                                        class="
                                            btn btn-icon btn-outline-info
                                            ms-1
                                        "
                                    >
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    @endcan @can('view', $item)
                                    <a
                                        href="{{ route('items.show', $item) }}"
                                        class="
                                            btn btn-icon btn-outline-warning
                                            ms-1
                                        "
                                    >
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    @endcan @can('delete', $item)
                                    <form
                                        action="{{ route('items.destroy', $item) }}"
                                        method="POST"
                                        class="inline pointer ms-1"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="
                                                btn btn-icon btn-outline-danger
                                            "
                                        >
                                            <i class="ti ti-trash-x"></i>
                                        </button>
                                    </form>
                                    @endcan
                                    <a href="{{ route('print', $item) }}" target="blank"
                                        class=" btn btn-icon btn-outline-success ms-1 " >
                                        <i class="ti ti-printer"></i>
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
            @if( $items->hasPages() )
            <div class="card-footer pb-0">{{ $items->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
