<div>
    @if ($mode === 'index')
        @include('livewire.partials.sites.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.sites.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.sites.edit')
    @endif
</div> 
