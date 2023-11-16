<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold flex flex-row text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
            <div class="px-2 text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                <h1>{{ __('Welcome Back') }}</h1>
            </div> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
