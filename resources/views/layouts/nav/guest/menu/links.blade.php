<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
        {{ __('Home') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('about.index') }}" :active="request()->routeIs('about.index')">
        {{ __('About') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('contact.create') }}" :active="request()->routeIs('contact.create')">
        {{ __('Contact us') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('pricing.index') }}" :active="request()->routeIs('pricing.index')">
        {{ __('Pricing') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('faqs.index') }}" :active="request()->routeIs('faqs.index')">
        {{ __('FaQs') }}
    </x-nav-link>
</div>