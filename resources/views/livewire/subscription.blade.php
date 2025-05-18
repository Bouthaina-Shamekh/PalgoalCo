<div>
    @if ($mode === 'index')
        @include('livewire.partials.subscription.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.subscription.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.subscription.edit')
    @endif
</div>
