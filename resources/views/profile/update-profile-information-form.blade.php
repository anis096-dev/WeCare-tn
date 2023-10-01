<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="name" value="{{ __('Name') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-user"></i>
            </span>
            <x-input id="name" type="text" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3 rtl:space-x-reverse">
            <x-label for="date_of_birth" value="{{ __('user.date_of_birth') }}" />
            <x-input id="date_of_birth" type="date" class="mt-1 relative block w-full" wire:model.defer="state.date_of_birth" required autocomplete="date_of_birth" />
            <x-input-error for="date_of_birth" class="mt-2" />
        </div>

        <!-- Country -->
        @php
            $countries = \App\Models\Country::all();
        @endphp
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="country_id" value="{{ __('country.country') }}"/>
            <x-select wire:model.defer="state.country_id" id="country_id" class="mt-1" required>
            <option value="" readonly="true" hidden="true" selected>
                {{ __('country.select country') }}
            </option>
            @foreach($countries as $key => $country)
            <option value="{{ $country->id }}">{{ __($country->name) }}</option>
            @endforeach
            </x-select>
            <x-input-error for="cityId" class="mt-2"/>
        </div>
        
        <!-- City -->
        @php
            $cities = \App\Models\City::where('country_id', $country->id)->get();
        @endphp
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="city_id" value="{{ __('city.city') }}"/>
            <x-select wire:model.defer="state.city_id" id="city_id" class="mt-1" required>
                <option value="" readonly="true" hidden="true" selected>
                    {{ __('city.select city') }}
                </option>
                @foreach($cities as $key => $city)
                <option value="{{ $city->id }}">{{ __($city->name) }}</option>
                @endforeach
            </x-select>
            <x-input-error for="cityId" class="mt-2"/>
        </div>

         <!-- Present Adress -->
         <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="present_adress" value="{{ __('user.present_adress') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-location-dot"></i>
            </span>
            <x-input id="present_adress" type="text" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.present_adress" required autocomplete="present_adress" />
            <x-input-error for="present_adress" class="mt-2" />
        </div>

        <!-- Permanent Adress -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="permanent_adress" value="{{ __('user.permanent_adress') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-location-dot"></i>
            </span>
            <x-input id="permanent_adress" type="text" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.permanent_adress" required autocomplete="permanent_adress" />
            <x-input-error for="permanent_adress" class="mt-2" />
        </div>

        <!-- Phone -->
        @if(auth()->user()->phone_verified == false)
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="phone" value="{{ __('user.phone') }}" />
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500 mr-1 rtl:ml-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
            </svg>
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-phone"></i>
            </span>
            <x-input id="phone" type="text" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.phone" required autocomplete="phone"/>
            <x-input-error for="phone" class="mt-2" />
        </div> 
        @else
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="phone" value="{{ __('user.phone') }}" />
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500 mr-1 rtl:ml-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
            </svg>
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-phone"></i>
            </span>
            <x-input id="phone" type="text" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.phone" required autocomplete="phone" readonly/>
            <button type="button" class="mt-1 underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
                {{ __('Click to verify a new phone number.') }}
            </button>
        </div> 
        @endif

         <!-- Occupation -->
         <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="occupation" value="{{ __('user.occupation') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-address-card"></i>
            </span>
            <x-input id="occupation" type="text" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.occupation" required autocomplete="occupation" />
            <x-input-error for="occupation" class="mt-2" />
        </div>

        <!-- bio -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="bio" value="{{ __('user.bio') }}" />
            <textarea id="bio" wire:model.defer="state.bio" class="lg:h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md  dark:bg-slate-900 dark:text-white" type="text" name="bio"></textarea>
            <x-input-error for="bio" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="email" value="{{ __('Email') }}" />
            <span class="dark:text-white z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9 rtl:pr-3">
                <i class="fa-solid fa-envelope"></i>
            </span>
            <x-input id="email" type="email" class="mt-1 relative block w-full pl-10 rtl:pr-10" wire:model.defer="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
