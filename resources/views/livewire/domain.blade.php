<div>
    @if ($mode === 'index')
        @include('livewire.partials.domain.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.domain.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.domain.edit')
    @endif
</div>
