<div>
    @if($showItemModel)
        <x-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('app.show') }} {{ __('subtreatment.subtreatment') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <div class="col-span-6 lg:col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('subtreatment.name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->name }}</div>
                    </div>
                </div>


                <div class="col-span-6 lg:col-span-2 rtl:text-left">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('subtreatment.treatment') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->treatment->name }}</div>
                    </div>
                </div>

                <div class="col-span-6 lg:col-span-2 text-center">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('subtreatment.price_day') }}</div>
                        <div class=" text-sm font-bold z-10">
                            <span class="bg-red-500 font-bold text-white rounded-md p-1">
                                {{ $item->price_day }}{{ $item->currency }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 lg:col-span-2 text-center">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('subtreatment.price_night') }}</div>
                        <div class=" text-sm font-bold z-10">
                            <span class="bg-green-500 font-bold text-white rounded-md p-1">
                                {{ $item->price_night }}{{ $item->currency }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 lg:col-span-2 text-center">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('subtreatment.price_weekend') }}</div>
                        <div class=" text-sm font-bold z-10">
                            <span class="bg-green-500 font-bold text-white rounded-md p-1">
                                {{ $item->price_weekend }}{{ $item->currency }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('app.created_at') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->created_at }}</div>
                    </div>
                </div>

                @if($item->created_at != $item->updated_at)
                    <div class="col-span-6 lg:col-span-3">
                        <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('app.updated_at') }}</div>
                            <div class=" text-sm font-bold z-10">{{ $item->updated_at }}</div>
                        </div>
                    </div>
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