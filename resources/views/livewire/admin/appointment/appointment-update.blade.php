<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{-- {{ __('app.update') }} {{ __('appointment.appointment') }} --}}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">            
                <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Wich profesionnal available?</h3>
                <div class="flex flex-wrap -m-2 mt-3">
                    @forelse ($users as $value)
                        <div class=" p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="{{ $userId == $value->id ? 'bg-blue-200' : 'bg-gray-200' }} h-full flex items-center border-gray-200 border p-4 rounded-lg hover:bg-blue-200 transform scale-100 hover:scale-105">
                                <input wire:model.defer="userId" type="radio" name="userId" value="{{ $value->id }}" class="block mb-16">
                                <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ $value->profile_photo_url }}" alt="{{ $value->name }}">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">{{$value->name}}</h2>
                                    <p class="text-gray-500"><span class="text-blue-500 font-bold">{{__($value->specialty->name) }}</span></p>
                                    <p class="text-gray-500">@:{{ $value->city->name }}</p>
                                </div>
                                <div>
                                <div class="absolute bottom-3 w-4 h-4 {{ $value->isOnline() ? 'bg-green-500' : 'bg-gray-500' }} rounded-full ltr:left-0 rtl:right-0 ltr:ml-1 rtl:mr-1"></div>
                                </div>
                            </div>
                        </div>
                    @empty
                        Emplty...
                    @endforelse
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ltr:ml-3 rtl:mr-3">
                    {{ __('app.update') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>
