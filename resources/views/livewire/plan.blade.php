<div>
    <div class="alert alert-{{ $alertType }}  justify-between items-center {{ $alert === false ? 'hidden' : 'flex' }}">
        {{ $alertMessage }}
        <button type="button" class="btn-close" wire:click="closeModal">
            <span class="pc-micon">
                <i class="material-icons-two-tone pc-icon">close</i>
            </span>
        </button>
    </div>
    @if ($mode === 'index')
        @include('livewire.partials.plan.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.plan.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.plan.edit')
    @endif
</div>
