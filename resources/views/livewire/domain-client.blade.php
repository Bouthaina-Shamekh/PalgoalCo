<div>
    <div class="alert alert-{{ $alertType }} justify-between items-center {{ $alert === false ? 'hidden' : 'flex' }}">
        {{ $alertMessage }}
        <button type="button" class="btn-close" wire:click="closeModal">
            <span class="pc-micon">
                <i class="material-icons-two-tone pc-icon">close</i>
            </span>
        </button>
    </div>

    @if ($mode === 'search')
        @include('livewire.partials.domain-client.search')
    @endif

    @if ($mode === 'buy')
        @include('livewire.partials.domain-client.buy')
    @endif

    @if ($mode === 'index')
        <h1>Domain Client</h1>
    @endif
</div>
