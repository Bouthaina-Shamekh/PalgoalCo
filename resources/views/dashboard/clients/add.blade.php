<x-dashboard-layout>
<!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Clients</a></li>
              <li class="breadcrumb-item" aria-current="page">Clients Add</li>
            </ul>
            <div class="page-header-title">
              <h2 class="mb-0">Clients Add</h2>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Basic Information</h5>
                </div>
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
                            name="first_name"
                            wire:model.defer="first_name"
                            label="First Name"
                            />
                            @error('first_name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                            name="last_name"
                            wire:model.defer="last_name"
                            label="Last Name"
                            />
                            @error('last_name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                            name="company_name"
                            wire:model.defer="company_name"
                            label="company name"
                            />
                            @error('company_name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                            name="mobile"
                            type="number"
                            wire:model.defer="mobile"
                            label="Mobile Number"
                            />
                            @error('mobile') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                            name="email"
                            type="email"
                            wire:model.defer="email"
                            label="email"
                            />
                            @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.select
                            wire:model.defer="can_login"
                            name="can_login"
                            label="status"
                            :options="[
                                '1'   => 'active',
                                '0' => 'inactive',
                                ]"
                            />
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                            name="password"
                            type="password"
                            wire:model.defer="password"
                            label="password"
                            />
                            @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <x-form.input
                            wire:model.defer="password_confirmation"
                            type="password"
                            label="Confirm Password"
                            />
                            @error('password_confirmation') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <div class="col-span-12 md:col-span-6">
                                <label class="form-label">Avatar</label>
                                <input type="file"
                                wire:model="avatar"
                                accept="image/*"
                                class="form-control" />
                                @error('avatar') <span class="text-red-600">{{ $message }}</span> @enderror
                                {{-- @if ($avatar) --}}
                                <img src="...."
                                class="mt-2 w-20 h-20 rounded-full" />
                                {{-- @endif --}}
                            </div>
                        </div>
                        <div class="col-span-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</x-dashboard-layout>