<div>
    @if ($mode === 'index')
        @include('livewire.partials.site.index')
    @elseif ($mode === 'add')
        @include('livewire.partials.site.add')
    @elseif ($mode === 'edit')
        @include('livewire.partials.site.edit')
    @endif
</div> 
