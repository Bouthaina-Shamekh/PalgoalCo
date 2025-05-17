<div>
    <div class="page-header">
        <div class="page-block">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">sites</a></li>
                <li class="breadcrumb-item" aria-current="page">sites List</li>
            </ul>
            <div class="page-header-title">
                <h2 class="mb-0">sites List</h2>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="sm:flex items-center justify-between">
                        <h5 class="mb-3 sm:mb-0">sites List</h5>
                        <div>
                            <a href="#" wire:click="showAdd" class="btn btn-primary">Add sites</a>
                            {{-- <a href="#" wire:click="resetForm" class="btn btn-primary">Add Client</a> --}}
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between py-4 px-5 gap-4">
                    <x-form.input
                        name="cpanel_username"
                        wire:model="search"
                        wire:input="updateSearch"
                        placeholder="Search clients..." />
                    <x-form.select
                        wire:model="perPage"
                        wire:change="updatePerPage"
                        name="perPage"
                        :options="[
                            '5'   => '5 per page',
                            '10' => '10 per page',
                            '25' => '25 per page',
                        ]" />
                </div>
                <div class="card-body pt-3">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Clients</th>
                                    <th>Domains</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sites as $site) 
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="flex items-center w-44">
                                            <div class="grow ltr:ml-3 rtl:mr-3">
                                                <h6 class="mb-0">{{ $site->client_id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$site->domain_id}}</td>
                                    <td>
                                        <span class="badge bg-success-500/10 text-success-500 rounded-full text-sm">Active</span>
                                        <span class="badge text-danger bg-danger-500/10 rounded-full text-sm">Inactive</span>
                                    </td>
                                    <td>
                                        <a wire:click="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-eye text-xl leading-none"></i>
                                        </a>
                                        <a wire:click="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-edit text-xl leading-none"></i>
                                        </a>
                                        <a wire:click="delete(1)" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-center text-gray-500">No sites found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4">
                    {{-- {{ $sites->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>