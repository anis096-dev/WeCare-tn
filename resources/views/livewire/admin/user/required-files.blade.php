@if(auth()->user()->status == false)

<x-form-section submit="save" enctype="multipart/form-data">
    <x-slot name="title">
        {{ __('documents') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile documents.') }}
    </x-slot>

    <x-slot name="form">
        
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch text-gray-500 text-sm underline mb-3">
        {{__('Great, just one last step to fully activate your account, you must upload a pdf document to ensure credibility with patients.')}}
        </div>
        <!-- CIN -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="CIN" value="{{ __('user.CIN') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-address-card"></i>
            </span>
            <x-input id="CIN" type="text" class="mt-1 relative block w-full rtl:pr-10" wire:model="CIN" required autocomplete="CIN" />
            <x-input-error for="CIN" class="mt-2" />
        </div>
    
        <!-- File -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch text-gray-500 text-sm underline mb-3">
                {{__('The pdf document must include your Identity Card(CIN) & Graduation certificate')}}
            </div>
            <x-label for="file" value="{{ __('user.file') }}" />
            <x-input id="file" type="file" class="mt-1 relative block w-full text-gray-300 text-xs 
            file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold
            file:text-white file:bg-violet-500 hover:file:bg-violet-600" wire:model="file" required/>
            <span class="text-gray-300 mt-2 text-xs">{{__('Choose Type')}}:pdf</span>
            <x-input-error for="file" class="mt-2" />
        </div>
       
    </x-slot>

    <x-slot name="actions">
        
        <div wire:loading wire:target="file">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 ml-2 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </div>

        <div wire:loading wire:target="save">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 ml-2 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </div>

        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
        
    </x-slot>
</x-form-section>  

@else

<x-form-section submit="save" enctype="multipart/form-data">
    <x-slot name="title">
        {{ __('documents') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile documents.') }}
    </x-slot>

    <x-slot name="form">
        
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch text-gray-500 text-sm underline mb-3">
            <div class="text-sm font-semibold text-green-500">
                {{ __('Your document is verified') }}
            </div>
        </div>

        <!-- CIN -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch">
            <x-label for="CIN" value="{{ __('user.CIN') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3 -mr-1">
                <i class="fa-solid fa-address-card"></i>
            </span>
            <span class="mt-3.5 relative block w-full rtl:pr-10">
                {{auth()->user()->CIN}}
            </span>
        </div>
    
        <!-- File -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="file" value="{{ __('user.file') }}" />
            <span class="mt-1 relative block w-full">
                {{auth()->user()->file}}
            </span>
        </div>
       
    </x-slot>
    <x-slot name="actions">
    </x-slot>
</x-form-section>

@endif