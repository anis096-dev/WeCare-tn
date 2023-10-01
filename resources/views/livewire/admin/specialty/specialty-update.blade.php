<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('app.update') }} {{ __('specialty.specialty') }}
        </x-slot>

        <form wire:submit.prevent="update" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-1 md:col-span-2">
                        <x-label for="name" value="{{ __('specialty.name') }}"/>
                        <x-input wire:model.defer="name" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="name" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <x-label for="slug" value="{{ __('specialty.slug') }}"/>
                        <x-input wire:model.defer="slug" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="slug" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="desc" value="{{ __('specialty.desc') }}"/>
                        <textarea wire:model.defer="desc" class="block mt-1 w-full dark:bg-slate-900 dark:text-white" type="text"></textarea>
                        <x-input-error for="desc" class="mt-2"/>            
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ltr:ml-3 rtl:mr-3">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>