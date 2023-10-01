<div>
    <x-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('app.create') }} {{ __('treatment.treatment') }}
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4">

                    <div class="col-span-4">
                        <x-label for="name" value="{{ __('treatment.name') }}"/>
                        <x-input wire:model.defer="name" id="name" type="text" class="mt-1 block w-full" />
                        <x-input-error for="name" class="mt-2"/>
                    </div>

                    <div class="col-span-4">
                        <x-label for="price_day" value="{{ __('treatment.price_day') }}"/>
                        <x-input wire:model.defer="price_day" id="price_day" type="number" class="mt-1 block w-full" />
                        <x-input-error for="price_day" class="mt-2"/>
                    </div>

                    <div class="col-span-4">
                        <x-label for="price_night_weekend" value="{{ __('treatment.price_night_weekend') }}"/>
                        <x-input wire:model.defer="price_night_weekend" id="price_night_weekend" type="number" class="mt-1 block w-full" />
                        <x-input-error for="price_night_weekend" class="mt-2"/>
                    </div>

                    <div class="col-span-4">
                        <x-label class="text-xs" for="specialtyId" value="{{ __('specialty.specialty') }}"/>
                        <x-select wire:model="specialtyId" wire:key="specialtyCreate" class="mt-1">
                            <option value="" readonly="true" hidden="true"
                                    selected>{{ __('specialty.select specialty') }}</option>
                            @forelse($specialties as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            @endforelse
                        </x-select>
                        <x-input-error for="specialtyId" class="mt-2"/>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ltr:ml-3 rtl:mr-3">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>