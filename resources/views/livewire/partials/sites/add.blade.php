<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">إنشاء موقع جديد</h2>

    @if(session()->has('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="grid grid-cols-12 gap-4">

        {{-- Client --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">العميل</label>
            <select wire:model="client_id" class="form-select w-full">
                <option value="">-- اختر العميل --</option>
                {{-- @foreach($clients as $client) --}}
                    <option value="1">العملاء</option>
                {{-- @endforeach --}}
            </select>
            @error('client_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- Domain --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">الدومين</label>
            <select wire:model="domain_id" class="form-select w-full">
                <option value="">-- اختر الدومين --</option>
                {{-- @foreach($domains as $domain) --}}
                    <option value="1">الدومينات</option>
                {{-- @endforeach --}}
            </select>
            @error('domain_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- Provisioning Status --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">حالة التزويد</label>
            <select wire:model="provisioning_status" class="form-select w-full">
                <option value="pending">Pending</option>
                <option value="provisioning">Provisioning</option>
                <option value="active">Active</option>
                <option value="failed">Failed</option>
            </select>
            @error('provisioning_status') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- cPanel Username --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">cPanel Username</label>
            <input type="text" wire:model.defer="cpanel_username" class="form-control w-full" />
            @error('cpanel_username') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- cPanel Password --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">cPanel Password</label>
            <input type="password" wire:model.defer="cpanel_password" class="form-control w-full" />
            @error('cpanel_password') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- cPanel URL --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">cPanel URL</label>
            <input type="url" wire:model.defer="cpanel_url" class="form-control w-full" />
            @error('cpanel_url') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- Provisioned At --}}
        <div class="col-span-12 md:col-span-6">
            <label class="form-label">تاريخ اكتمال التزويد (اختياري)</label>
            <input type="datetime-local" wire:model.defer="provisioned_at" class="form-control w-full" />
            @error('provisioned_at') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- Submit --}}
        <div class="col-span-12 text-right">
            <button type="submit" class="btn btn-primary">حفظ</button>
            <button type="button" wire:click="$emitUp('showIndex')" class="btn btn-secondary ml-2">إلغاء</button>
        </div>
    </form>
</div>
