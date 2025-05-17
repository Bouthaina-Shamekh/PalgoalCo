    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Sites</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Site</li>
            </ul>
            <div class="page-header-title">
                <h2 class="mb-0">Edit Site</h2>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    {{--Success messages--}}
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form wire:submit.prevent="submit" class="grid grid-cols-12 gap-x-6">
                        <!-- First & Last Name -->
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="client_id"
                                wire:model="site.client_id"
                                label="Clinet" />
                            @error('site.client_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="domain_id"
                                wire:model="site.domain_id"
                                label="Domain" />
                            @error('site.domain_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="provisioning_status"
                                wire:model="site.provisioning_status"
                                label="Provisioning Status" />
                            @error('site.provisioning_status') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="cpanel_username"
                                wire:model="site.cpanel_username"
                                label="Cpanel Username" />
                            @error('site.cpanel_username') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <!-- <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="email"
                                type="email"
                                wire:model="client.email"
                                label="email" />
                            @error('client.email') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div> -->
                        <!-- <div class="col-span-12 md:col-span-6">
                            <x-form.select
                                wire:model="client.can_login"
                                name="can_login"
                                label="status"
                                :options="[
                                '1'   => 'active',
                                '0' => 'inactive',
                                ]" />
                        </div> -->
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="cpanel_password"
                                type="password"
                                wire:model="site.cpanel_password"
                                label="password" />
                            @error('site.cpanel_password') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="cpanel_url"
                                wire:model="site.cpanel_url"
                            label="Cpanel Url" />
                            @error('site.cpanel_url') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                                name="provisioned_at"
                                wire:model="site.provisioned_at"
                                label="Provisioned At" />
                            @error('site.provisioned_at') <span class="text-red-600">{{ $message }}</span> @enderror
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
    <!-- [ Main Content ] end -->