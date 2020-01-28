
<div class="side-bar-btn">
    <a href="{{ route('home') }}" class="my-btn btn-side-bar {{ active_class_html(route('home')) }}">
        <span>@lang('page.home_my_data')</span>
    </a>
    <a href="{{ route('change.password') }}" class="my-btn btn-side-bar {{ active_class_html(route('change.password')) }}">
        <span>@lang('auth.change_pass')</span>
    </a>
    <a href="{{ route('home.orders') }}" class="my-btn btn-side-bar {{ active_class_html(route('home.orders')) }}">
        <span>@lang('page.my_orders')</span>
    </a>

    <a href="{{ route('home.vins') }}" class="my-btn btn-side-bar {{ active_class_html(route('home.vins')) }}">
        <span>@lang('page.my_vins')</span>
    </a>


@if (Auth::user()->isAdmin())
        <a href="{{ route('home.admin') }}" class="my-btn btn-side-bar admin-btn{{ active_class_html(route('home.admin')) }}">
            <span>@lang('page.admin')</span>
        </a>
    @endif


    <button class="my-btn btn-side-bar btnLogout"><span>@lang('auth.logout')</span></button>
    <form class="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>


</div>

