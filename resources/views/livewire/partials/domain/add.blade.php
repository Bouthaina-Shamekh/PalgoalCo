<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0)">Domains</a></li>
            <li class="breadcrumb-item" aria-current="page">Domains Add</li>
        </ul>
        <div class="page-header-title">
            <h2 class="mb-0">Domains Add</h2>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="grid grid-cols-12 gap-x-6">
    <div class="col-span-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">New Subscription</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save" class="grid grid-cols-12 gap-x-6">
                    <div class="col-span-12 md:col-span-6">
                        <div class="mb-3">
                            <label for="client_id" class="form-label">Client</label>
                            <select id="client_id" wire:model.defer="client_id" class="form-select">
                                <option value="">-- Select Client --</option>
                                    <option value="1">cleint 1</option>
                                    <option value="1">cleint 2</option>
                            </select>
                            @error('client_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="mb-3">
                            <x-form.input
                                label="Domain Name"
                                wire:model.defer=" "
                                name="domain_name"
                                type="text"
                                placeholder="e.g. example.com or client.palgoals.com"
                            />
                            @error('client_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="mb-3">
                            <label for="client_id" class="form-label">Registrar Domain</label>
                            <select id="client_id" wire:model.defer="client_id" class="form-select">
                                <option value="">-- Select Registrar Domain --</option>
                                    <option value="1">enom</option>
                                    <option value="1">namcheap</option>
                            </select>
                            @error('client_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="mb-3">
                            <x-form.input
                                label="Registration Date"
                                wire:model.defer="domain.registration_date"
                                name="domain_name"
                                type="date"
                                placeholder="e.g. example.com or client.palgoals.com"
                            />
                            @error('domain.registration_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="mb-3">
                            <x-form.input
                                label="Renewal Date"
                                wire:model.defer="domain.renewal_date"
                                name="domain_name"
                                type="date"
                                placeholder="e.g. example.com or client.palgoals.com"
                            />
                            @error('domain.renewal_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="mb-3">
                            <label for="domain.status" class="form-label">Status</label>
                            <select id="domain.status" wire:model.defer="domain.status" class="form-select">
                                <option value="">-- Select Registrar Domain --</option>
                                    <option value="active">active</option>
                                    <option value="expired">expired</option>
                                    <option value="pending">pending</option>
                            </select>
                            @error('domain.status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-12 text-right">
                        <button type="button" wire:click="showIndex" class="btn btn-secondary">Cancel</button>
                        <button type="button" wire:click="save" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

