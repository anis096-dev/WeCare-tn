<div>
    <x-confirmation-modal wire:model="showDeleteModel">
        <x-slot name="title">
            {{ __('app.delete') }} {{ __('treatment.treatment') }}
        </x-slot>

        <x-slot name="content">
            {{ __('treatment.delete question') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeDeleteModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="mr-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>


    <x-confirmation-modal wire:model="showRestoreModel">
        <x-slot name="title">
            {{ __('app.restore') }} {{ __('treatment.treatment') }}
        </x-slot>

        <x-slot name="content">
            {{ __('app.restore question') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeRestoreModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="restore" wire:loading.attr="disabled">
                {{ __('app.restore') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>



    <x-confirmation-modal wire:model="showForceDeleteModel">
        <x-slot name="title">
            {{ __('app.delete') }} {{ __('treatment.treatment') }}
        </x-slot>

        <x-slot name="content">
            {{ __('treatment.force delete question') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeForceDeleteModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="forceDelete" wire:loading.attr="disabled">
                {{ __('app.delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>


</div>