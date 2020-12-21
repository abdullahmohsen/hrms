<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

            <li><a href="{{ route('employees.index') }}"><i class="fa fa-users"></i><span>Employees</span></a></li>

            <li><a href="{{ route('departments.index') }}"><i class="fa fa-th"></i><span>Departments</span></a></li>

            <li><a href="{{ route('positions.index') }}"><i class="fa fa-th"></i><span>Positions</span></a></li>

            {{-- @if (auth()->user()->hasPermission('read_categories'))
                <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-th"></i><span>@lang('site.main-categories')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_categories'))
                <li><a href="{{ route('dashboard.subcategories.index') }}"><i class="fa fa-th"></i><span>@lang('site.subcategories')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_products'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i><span>@lang('site.products')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_client'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i><span>@lang('site.products')</span></a></li>
            @endif --}}

        </ul>

    </section>

</aside>

