<div>
    @if ($mode === 'index')
        @include('livewire.partials.subscriptions.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.subscriptions.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.subscriptions.edit')
    @endif
</div>
