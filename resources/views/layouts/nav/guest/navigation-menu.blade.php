<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    
    @if (Route::has('login'))
    <div class="flex sm:top-0 p-6 bg-indigo-50 justify-center ltr:text-right rtl:text-left z-10">
    @auth
        <a href="{{ url('/dashboard') }}" class=" text-sm font-semibold text-gray-600 hover:text-gray-900">{{__('Dashboard')}}</a>
    @else
        <a href="{{ route('login') }}" class=" text-sm font-semibold text-gray-600 hover:text-gray-900">{{__('Member')}}</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ltr:ml-4 rtl:mr-4 text-sm font-semibold text-gray-600 hover:text-gray-900">{{__('Join us now!')}}</a>
        @endif
    @endauth
    <a href="#rdv" class="rtl:mr-4 ltr:ml-4 -mt-3.5 p-2 font-bold bg-blue-50 border-4 border-blue-400 rounded-full hover:bg-blue-200 hover:border-blue-600" >{{__('Booking now!')}}</a>
    </div>
    @endif
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between sm:justify-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block h-9 w-auto rtl:ml-8" />
                    </a>
                </div>
                <!-- Navigation Links -->
                @include('layouts.nav.guest.menu.links')
            </div>
            
            <div class="hidden sm:flex sm:items-center ltr:sm:ml-6 rtl:sm:mr-6">
                <x-button-dark-mode/>
            </div>

             <!-- Hamburger -->
             <div class="ltr:-mr-2 rtl:-ml-2 flex items-center sm:hidden">
                
                <x-button-dark-mode/>

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @include('layouts.nav.guest.menu.responsive-link')
    </div>
</nav>
