<div wire:init="loadItems">

    <div wire:loading class="w-full">
        <div class="flex justify-center items-center mt-32">
            <x-svg.svg-spinner class="w-24 h-24 fill-primary-700 dark:fill-primary-400"/>
        </div>
    </div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 text-primary-700 dark:text-primary-400">
            {{ __('appointment.appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pr-0 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-5 overflow-hidden text-gray-800 shadow-xl lg:px-0 sm:px-10 bg-gray-50 sm:rounded-lg lg:rounded-3xl dark:bg-gray-900 dark:text-gray-400">
                <div class="flex flex-wrap items-center">
                    <div class="relative flex-row flex-1 w-full max-w-full px-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300"> {{ __('appointment.appointments') }}</h3>
                            </div>
                        </div>

                        <div class="relative grid grid-cols-6 gap-6 mt-2 ">

                            <div class="col-span-3 md:col-span-2 lg:col-span-2">
                                <x-label class="text-xs" for="search" value="{{ __('app.search') }}"/>
                                <x-input wire:model="term" id="search" type="text" class="block w-full mt-1"
                                            autocomplete="off"/>
                            </div>

                            <div class="col-span-3 md:col-span-2 lg:col-span-1">
                                <x-label class="text-xs" for="select" value="{{ __('app.PerPage') }}"/>
                                <x-select wire:model="perPage" class="mt-1">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </x-select>
                            </div>

                            <div class="col-span-3 md:col-span-2 lg:col-span-2">
                                <x-label class="text-xs" for="trashed" value="{{ __('app.Show Trashed') }}"/>
                                <x-checkbox wire:model="trashed" value="true" class="block mt-3 w-7 h-7"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-0 overflow-hidden mt-7">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr class="text-sm font-semibold text-gray-500 border-y ltr:text-left rtl:text-right dark:border-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700/30">
                                <th class="w-10 px-2 py-3 text-center">{{ __('appointment_id') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.name') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.phone') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.start_date') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.country') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.city') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.specialty') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('appointment.treatments') }}</th>
                                <th class="px-2 py-3 text-center">{{ $trashed ? __('app.deleted_at') : __('app.created_at') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('app.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-900">
                            @forelse($appointments as $appointment)
                                <tr class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800 hover:dark:text-gray-200 hover:bg-gray-100 hover:dark:bg-gray-700">
                                    <td class="px-2 py-3 text-center text-xx">
                                        {{ $appointment->appointment_id }}
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center uppercase">
                                        {{ $appointment->first_name }} {{ $appointment->last_name }}
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center capitalize">
                                        {{ $appointment->phone }}
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center capitalize">
                                        {{ $appointment->start_date }}
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center capitalize">
                                        {{ $appointment->country->name }}
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center capitalize">
                                        {{ $appointment->city->name }}
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center capitalize">
                                        {{ $appointment->specialty->name }}
                                    </td>
                                    @php
                                        $subtreatments_Ids = json_decode($appointment->subtreatments);
                                        $subtreatments = \App\Models\SubTreatment::whereIn('id', $subtreatments_Ids)->get();
                                    @endphp
                                    <td class="px-2 py-3 text-sm text-center capitalize">
                                        @foreach ($subtreatments as $item)
                                        <li class="text-left">{{$item->name}}</li>
                                        @endforeach
                                    </td>
                                    <td class="px-2 py-3 text-sm text-center">
                                        {{ $trashed ? $appointment->deleted_at->diffForHumans() : $appointment->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-between gap-1 text-sm text-center">

                                            @if($trashed)
                                                @can('restore', $appointment)
                                                    <x-button2 wire:click="selectedItem('restore',{{ $appointment->id }})"
                                                                  class="px-2">
                                                        <x-svg.svg-restore class="w-5 h-5"/>
                                                    </x-button2>
                                                @endcan

                                                @can('forceDelete', $appointment)
                                                    <x-button2
                                                            wire:click="selectedItem('forceDelete',{{ $appointment->id }})"
                                                            class="px-2">
                                                        <x-svg.svg-force-delete class="w-5 h-5"/>
                                                    </x-button2>
                                                @endcan

                                            @else
                                                @can('update', $appointment)
                                                    <x-button2 wire:click="selectedItem('update',{{ $appointment->id }})"
                                                                class="px-2">
                                                        <x-svg.svg-update class="w-5 h-5"/>
                                                    </x-button2>
                                                @endcan

                                                @can('view', $appointment)
                                                    <x-button2 wire:click="selectedItem('show',{{ $appointment->id }})"
                                                                  class="px-2">
                                                        <x-svg.svg-show class="w-5 h-5"/>
                                                    </x-button2>
                                                @endcan


                                                @can('delete', $appointment)
                                                    <x-button2 wire:click="selectedItem('delete',{{ $appointment->id }})"
                                                                  class="px-2">
                                                        <x-svg.svg-delete class="w-5 h-5"/>
                                                    </x-button2>
                                                @endcan

                                            @endif


                                        </div>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="7"
                                        class="px-4 py-3 text-sm text-center text-gray-700 dark:text-gray-400">{{ __('app.No Data') }}</td>
                                </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(!empty($appointments))
                        <div class="px-4 py-3 border-t dark:border-gray-700">
                            {{ $appointments->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <livewire:admin.appointment.appointment-update :specialties="$specialties"/>
    <livewire:admin.appointment.appointment-show/>
    <livewire:admin.appointment.appointment-delete/>

</div>

