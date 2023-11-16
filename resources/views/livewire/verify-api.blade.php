<div class="bg-gray-200 dark:bg-gray-500 dark:text-white p-5 rounded shadow-lg w-full md:w-1/3">
    <h6 class="uppercase text-sm text-center text-indigo-500 font-bold"
    :class="{ 'text-indigo-500' : status === 'pending', 'text-green-500' : status === 'approved'}"
    >{{$status}}
    </h6>
    <h6 class="uppercase text-sm text-center text-red-500 font-bold">{{$error}}</h6> 
    <div x-data="{ open: false }">
        <form wire:submit.prevent="sendCode">
            <x-label for="phone" value="{{ __('Verify Your Phone Number') }}"/>
            <div class="flex flex-row-reverse">
                @php
                    $countries = \App\Models\Country::all();
                @endphp
                <x-select wire:model="country_code" class="mt-1 block sm:w-1/4 w-2/5 mr-1">
                    <option class="text-xs" readonly="true" hidden="true" selected>{{ __('Code') }}</option>
                    @forelse($countries as $key => $country)
                        <option value="{{ $country->country_code }}">{{ $country->country_code }}</option>
                    @empty
                    @endforelse
                </x-select>
                <x-input wire:model.defer="phone" type="tel" class="mt-1 block w-full text-left"/>
            </div>
            <x-input-error for="country_code" class="mt-2"/>
            <x-input-error for="phone" class="mt-2"/>
            <button x-on:click="open = true" type="submit" class="w-full bg-indigo-500 text-white rounded-lg my-4 py-2 uppercase font-bold">{{__('Verify')}}</button>
        </form>
        <div x-show.important="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">
        <form wire:submit.prevent="verifyCode">
            <x-label for="code" value="{{__('Enter code')}}"/>
            <x-input for="code" wire:model="code" type="text" class="mt-1 block w-full" />
            <x-input-error for="code" class="mt-2" hidden/>
            <button type="submit" class="w-full bg-indigo-500 text-white rounded-lg my-4 py-2 uppercase font-bold">{{__('Verify Code')}}</button>
        </form>
        </div>
    </div>  
</div>