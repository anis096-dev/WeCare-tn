<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">
        {{ __('app.admin index') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.user.index') }}" :active="request()->routeIs('admin.user.index')">
        {{ __('user.users') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.role.index') }}" :active="request()->routeIs('admin.role.index')">
        {{ __('role.roles') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.permission.index') }}" :active="request()->routeIs('admin.permission.index')">
        {{ __('permission.permissions') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.specialty.index') }}" :active="request()->routeIs('admin.specialty.index')">
        {{ __('specialty.specialties') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.treatment.index') }}" :active="request()->routeIs('admin.treatment.index')">
        {{ __('treatment.treatments') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.subtreatment.index') }}" :active="request()->routeIs('admin.subtreatment.index')">
        {{ __('subtreatment.subtreatments') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.contact.index') }}" :active="request()->routeIs('admin.contact.index')">
        {{ __('contact.contacts') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('admin.appointment.index') }}" :active="request()->routeIs('admin.appointment.index')">
        {{ __('appointment.appointments') }}
    </x-nav-link>
</div>