<div>
    <form wire:submit.prevent="create"> 
        {{-- STEP 1 --}}
        @if ($currentStep == 1)      
        <div class="step-one">
            <div class="flex justify-center mx-auto">
                <div class="bg-white p-10 dark:bg-gray-800 rounded-xl">
                    
                    <h1 class="pb-4 text-2xl dark:text-white font-semibold">STEP 1/4 - RDV Details</h1>
                    <p class="leading-relaxed text-base mb-2">{{__('Which professional are you looking for?')}}</p>

                    <div class="ltr:mr-1 rtl:ml-1">
                        <x-select wire:model="specialtyId" name="specialtyId" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                            <option value="">-- choose specialty --</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="specialtyId" class="mt-2"/>
                    </div>

                    <div class="text-start mt-6 ltr:mr-1 rtl:ml-1">
                        <label class="block font-medium text-sm text-gray-700 mb-4" for="treatments">
                            Treatments*
                        </label>
                        @forelse ($treatments as $treatment)
                        <div class="pt-4">
                            <span class="mr-2 text-2xl font-bold">*</span>
                            <span class="font-bold text-xl" value="{{ $treatment->id }}">{{ $treatment->name }}</span>
                        </div>
                        @php
                            $subtreatments = \App\Models\SubTreatment::where('treatment_id', $treatment->id)->get();
                        @endphp
                            @foreach ($subtreatments as $subtreatment)
                            <div class="pt-4">
                                <input wire:model="subtreatments" name="subtreatments[]" class="mx-2" type="checkbox" value="{{ $subtreatment->id }}"><span class="text-sm justify-center">{{ $subtreatment->name }}</span>
                            </div>     
                            @endforeach
                        @empty
                        <span class=" text-sm">-- choose a specialty first --</span>
                        @endforelse
                        <x-input-error for="subtreatments" class="mt-2"/>
                    </div>

                </div>
            </div>
        </div>
        @endif

        {{-- Step 2 --}}
        @if ($currentStep == 2)      
        <div class="step-two">
            <div class="flex justify-center mx-auto">
                <div class="bg-white p-10 dark:bg-gray-800 rounded-xl">
                    <h1 class="pb-4 text-2xl dark:text-white font-semibold">STEP 2/4 - Disponibilies</h1>
                    <div class="grid grid-cols-1 mt-4 md:grid-cols-4 lg:grid-cols-4 gap-4 text-left">
                        
                        <div class="col-span-4 ltr:mr-1 rtl:ml-1">
                            <x-label for="number_of_visits">Nbre of Visits/day*</x-label>    
                            <x-select wire:model="number_of_visits" class="mt-1 block w-full">
                                <option value="">-- select --</option>
                                @foreach (App\Models\Appointment::nbre_of_visits() as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="number_of_visits" class="mt-2" />
                        </div>
    
                        <div class="col-span-4 rtl:ml-1">
                            <x-label for="duration">How long is your treatment?*</x-label>    
                            <x-select wire:model="duration" class="mt-1 block w-full">
                                <option value="">-- select --</option>
                                @foreach (App\Models\Appointment::duration() as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="duration" class="mt-2" />
                        </div>

                        <div class="col-span-4 rtl:ml-1">
                            <x-label for="start_date">Start Date & When you're available*</x-label>    
                            <x-input wire:model="start_date" type="datetime-local" class="mt-1 block w-full" />
                            <x-input-error for="start_date" class="mt-2" />
                        </div>
    
                        <div class="col-span-4 rtl:ml-1">
                            <x-label for="Location_of_care">Location of Care*</x-label>
                            <x-select wire:model="Location_of_care" class="mt-1 block w-full">
                                <option value="">-- select --</option>
                                @foreach (App\Models\Appointment::careplace() as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="Location_of_care" class="mt-2" />
                        </div>

                    </div>            
                </div>
            </div>
        </div>
        @endif 

        {{-- Step 3 --}}
        @if ($currentStep == 3)      
        <div class="step-three">
            <div class="flex justify-center mx-auto">
                <div class="bg-white p-10 dark:bg-gray-800 rounded-xl">
                    <h1 class="pb-4 text-2xl dark:text-white font-semibold">STEP 3/4 - Personal Details</h1>
                    <div class="grid grid-cols-1 mt-4 md:grid-cols-4 lg:grid-cols-4 gap-4 text-left">
                        
                        <div class="col-span-2 sm:col-span-1 ltr:mr-1 rtl:ml-1">
                            <label class="block font-medium text-sm text-gray-700" for="countryId">
                                Country*
                            </label>
                            <x-select wire:model="countryId" name="countryId" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                                <option value="">-- choose country --</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="countryId" class="mt-2" />
                        </div>
                
                        <div class="col-span-2 sm:col-span-1 ltr:mr-1 rtl:ml-1">
                            <label class="block font-medium text-sm text-gray-700" for="cityId">
                                City*
                            </label>
                            <x-select wire:model="cityId" name="cityId" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                                <option value="">-- choose city --</option>
                                @forelse ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @empty
                                <option class="text-xs font-bold">empty data.</option>
                                @endforelse
                            </x-select>
                            <x-input-error for="cityId" class="mt-2" />
                        </div>
                
                        <div class="col-span-2 ltr:mr-1 rtl:ml-1">
                            <x-label for="adress">Adress*</x-label>    
                            <x-input wire:model="adress" type="text" class="mt-1 block w-full" required/>
                            <x-input-error for="adress" class="mt-2" />
                        </div>

                        <div class="col-span-2 sm:col-span-1 ltr:mr-1 rtl:ml-1">
                            <x-label for="first_name">First Name*</x-label>    
                            <x-input wire:model="first_name" type="text" class="mt-1 block w-full" required/>
                            <x-input-error for="first_name" class="mt-2" />
                        </div>
    
                        <div class="col-span-2 sm:col-span-1 ltr:mr-1 rtl:ml-1">
                            <x-label for="last_name">Last Name*</x-label>    
                            <x-input wire:model="last_name" type="text" class="mt-1 block w-full" required/>
                            <x-input-error for="last_name" class="mt-2" />
                        </div>

                        <div class="col-span-2 sm:col-span-1 ltr:mr-1 rtl:ml-1">
                            <x-label for="age">Age*</x-label>    
                            <x-input wire:model="age" type="number" class="mt-1 block w-full" required/>
                            <x-input-error for="age" class="mt-2" />
                        </div>
    
                        <div class="col-span-2 sm:col-span-1 ltr:mr-1 rtl:ml-1">
                            <x-label for="gender">Gender*</x-label>
                            <x-select wire:model="gender" class="mt-1 block w-full" required>
                                <option value="">-- select --</option>
                                <option value="{{__('male')}}">Male</option>
                                <option value="{{__('female')}}">Female</option>
                            </x-select>
                            <x-input-error for="gender" class="mt-2" />
                        </div>

                        <div class="col-span-2 ltr:mr-1 rtl:ml-1">
                            <x-label for="phone">Phone*</x-label>    
                            <x-input wire:model="phone" type="number" class="mt-1 block w-full" required/>
                            <x-input-error for="phone" class="mt-2" />
                        </div>

                        <div class="col-span-2 ltr:mr-1 rtl:ml-1">
                            <x-label for="email">Email</x-label>    
                            <x-input wire:model="email" type="text" class="mt-1 block w-full" required/>
                            <x-input-error for="email" class="mt-2" />
                        </div>

                    </div>            
                </div>
            </div>
        </div>
        @endif 

        {{-- Step 4 --}}
        @if ($currentStep == 4)      
        <div class="step-four">
            <div class="flex justify-center mx-auto">
                <div class="bg-white p-10 dark:bg-gray-800 rounded-xl">
                    <h1 class="pb-4 text-2xl dark:text-white font-semibold">STEP 4/4 - Prescription File</h1>                        
                        
                    <!-- Prescription -->
                    @if ($prescription == null || $prescription == "No" )
                    <div class="col-span-2 ltr:mr-1 rtl:ml-1">
                        <x-label class="block font-medium text-sm text-gray-700 mb-4" for="prescription" value="{{ __('Do you have prescription?*') }}" />
                        <div class="mt-2">
                            <x-input wire:model="prescription" type="radio" class="form-radio" class="p-2" name="prescription" value="Yes"/>
                            <span class="ml-1 mr-2 text-sm">Yes</span>
                        
                            <x-input wire:model="prescription" type="radio" class="form-radio" class="p-2" name="prescription"  value="No"/>
                            <span class="ml-1 text-sm">No</span>
                        </div>
                        <x-input-error for="prescription" class="mt-2"/>
                    </div>
                    @endif

                    <!-- Prescription File -->
                    @if ($prescription == "Yes")
                    <div class="col-span-2 ltr:mr-1 rtl:ml-1 mt-2">
                        <div class="flex flex-row items-center justify-center">
                            <div class="relative justify-center">
                                <span class="relative flex w-full flex-wrap items-stretch text-gray-500 text-sm underline mb-4">
                                    {{__('If the Doctor gave you a prescription_file, please send it!')}}
                                </span>
                                <div class="w-full h-40 bg-gray-200 dark:bg-gray-700 rounded-md">
                                    @if(!empty($prescriptionFile))
                                    <img src="{{ $prescriptionFile->temporaryUrl() }}"
                                            class="object-cover w-full h-40 rounded-md">
                                    @endif
                                </div>
                                <span class="absolute bottom-0 left-0 w-8 h-8 p-2 rounded-full bg-primary-600 shadow-md">
                                    <label>
                                        <svg wire:target="iconPath" wire:loading.class="animate-bounce" class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <input wire:model="prescriptionFile" type="file" class="hidden opacity-0">
                                    </label>
                                </span>
                                <x-input-error for="prescriptionFile" class="mt-2"/>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @endif 

        <div class="flex items-center justify-center mt-4 space-x-36">
            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)            
            <button wire:click="decreaseStep()" type="button" class=" bg-violet-500 rounded-md px-4 py-2 text-white">Back</button>
            @endif
            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 )
            <button wire:click="increaseStep()" type="button" class="bg-violet-700 rounded-md px-4 py-2 text-white">Next</button>
            @endif
            @if ($currentStep == 4)
            {{-- Here we will add payment method --}}
            <button type="submit" class="bg-violet-900 rounded-md px-4 py-2 text-white">Submit</button>
            @endif
        </div>
    </form>
</div>
