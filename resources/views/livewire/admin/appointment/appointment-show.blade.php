<div>
    @if($showItemModel)
        <x-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('app.show') }} {{ __('appointment.appointment') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment_id') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->appointment_id }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->first_name }} {{ $item->last_name }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.phone') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->phone }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.email') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->email }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.age') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->age }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.gender') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->gender }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.country') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->country->name }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.city') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->city->name }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.adress') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->adress }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.start_date') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->start_date }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.duration') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->duration }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.number_of_visits') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->number_of_visits }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.Location_of_care') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->Location_of_care }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.prescription') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->prescription }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.specialty') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->specialty->name }}</div>
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('appointment.treatments') }}</div>
                        @foreach ($subtreatments as $subtreatment)
                        <div class=" text-sm font-bold z-10">
                            <li>
                                {{ $subtreatment->name }}
                            </li>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('app.created_at') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->created_at }}</div>
                    </div>
                </div>

                @if($item->created_at != $item->updated_at)
                    <div class="col-span-2 rtl:text-left">
                        <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('app.updated_at') }}</div>
                            <div class=" text-sm font-bold z-10">{{ $item->updated_at }}</div>
                        </div>
                    </div>
                @endif

            </div>

            <div class="mt-4">                    
                @if(!empty($item->prescription_file))
                <img src="{{ Storage::url($item->prescription_file) }}" class="flex mt-2 w-auto h-screen">
                @else
                <h3>{{__('appointment.No prescription file found!!')}}</h3>
                @endif 
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeItemModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
        </x-slot>

    </x-dialog-modal>
    @endif

</div>
