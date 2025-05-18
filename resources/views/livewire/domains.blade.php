<div>
    @if ($mode === 'index')
        @include('livewire.partials.client.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.client.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.client.edit')
    @endif
</div>
