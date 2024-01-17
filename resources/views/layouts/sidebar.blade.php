<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item  {{ $page == 'dashboard'? 'active':''  }}">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                </span>
                                <span class="nav-link-title">
                                    {{ __('Dashboard') }}
                                </span>
                            </a>
                        </li>
                            @can('view-any', App\Models\Issue::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('issues.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Issues
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Item::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('items.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الاصناف
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Office::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('offices.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            المكاتب
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الموظفين
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Invoice::class)
                                <li class="nav-item dropdown">
                                    
                                    <a class="nav-link dropdown-toggle " href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="true">
                                         
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الفواتير
                                        </span>
                                    </a>
                                    <div class="dropdown-menu" data-bs-popper="static">
                                        <a class="dropdown-item" href="{{ route('invoices.index',['search'=>'صادر']) }}" target="_blank" rel="noopener">
                                          صادر
                                        </a>
                                        <a class="dropdown-item" href="{{ route('invoices.index',['search'=>'وارد']) }}" target="_blank" rel="noopener">
                                          وارد
                                        </a>
                                        <a class="dropdown-item" href="{{ route('invoices.index',['search'=>'تالف']) }}" target="_blank" rel="noopener">
                                          تالف
                                        </a>
                                      </div>
  
                                </li>
                            @endcan
                            @can('view-any', App\Models\Order::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('orders.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            متطلبات المكاتب
                                        </span>
                                    </a>
                                </li>
                            @endcan
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
