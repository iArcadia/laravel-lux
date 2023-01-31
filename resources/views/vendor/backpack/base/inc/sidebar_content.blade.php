{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}
    </a>
</li>

@if (!lux_config('auth.unique_user'))
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('user') }}">
            <i class="nav-icon la la-user"></i>
            Users
        </a>
    </li>
@endif
