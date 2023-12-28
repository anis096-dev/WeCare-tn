<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="rtl:text-right" href="{{ route('home') }}" :active="request()->routeIs('home')">
        {{ __('Home') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="rtl:text-right" href="{{ route('about.index') }}" :active="request()->routeIs('about.index')">
        {{ __('About') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="rtl:text-right" href="{{ route('contact.create') }}" :active="request()->routeIs('contact.create')">
        {{ __('Contact us') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="rtl:text-right" href="{{ route('pricing.index') }}" :active="request()->routeIs('pricing.index')">
        {{ __('Pricing') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="rtl:text-right" href="{{ route('faqs.index') }}" :active="request()->routeIs('faqs.index')">
        {{ __('FaQs') }}
    </x-responsive-nav-link>
</div>