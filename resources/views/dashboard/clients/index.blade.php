<x-dashboard-layout>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Clients</a></li>
                <li class="breadcrumb-item" aria-current="page">Clients List</li>
            </ul>
            <div class="page-header-title">
                <h2 class="mb-0">Clients List</h2>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="sm:flex items-center justify-between">
                        <h5 class="mb-3 sm:mb-0">Clients List</h5>
                        <div>
                            <a href="/dashboard/clients/create" class="btn btn-primary">Add Clients</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label for="search" class="sr-only">ابحث عن عميل</label>
                    <input 
                    id="search"
                    type="text" 
                    wire:model.debounce.300ms="search" 
                    placeholder="Search clients..." 
                    class="form-search relative" />
                    <select wire:model="perPage" class="border rounded px-2 py-1">
                        <option value="5">5 per page</option>
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                    </select>
                </div>
                <div class="card-body pt-3">
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Subscriptions</th>
                                    <th>Sites</th>
                                    <th>Joined</th>
                                    <th>STATUS</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="flex items-center w-44">
                                            <div class="shrink-0">
                                                <img src="../assets/images/user/avatar-1.jpg" alt="user image" class="rounded-full w-10" />
                                            </div>
                                            <div class="grow ltr:ml-3 rtl:mr-3">
                                                <h6 class="mb-0">hazem alyahya</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>info@palgoals.com</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>2025-05-10</td>
                                    <td><span class="badge text-danger bg-danger-500/10 rounded-full text-sm">inactive</span></td>
                                    <td>
                                        <a href="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-eye text-xl leading-none"></i>
                                        </a>
                                        <a href="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-edit text-xl leading-none"></i>
                                        </a>
                                        <a href="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="flex items-center w-44">
                                            <div class="shrink-0">
                                                <img src="../assets/images/user/avatar-1.jpg" alt="user image" class="rounded-full w-10" />
                                            </div>
                                            <div class="grow ltr:ml-3 rtl:mr-3">
                                                <h6 class="mb-0">hazem alyahya</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>info@palgoals.com</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>2025-05-10</td>
                                    <td><span class="badge bg-success-500/10 text-success-500 rounded-full text-sm">Active</span></td>
                                    <td>
                                        <a href="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-eye text-xl leading-none"></i>
                                        </a>
                                        <a href="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-edit text-xl leading-none"></i>
                                        </a>
                                        <a href="#" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="flex justify-center *:*:inline-block *:*:px-3 *:*:py-1.5 *:border *:border-theme-border *:dark:border-themedark-border hover:*:bg-secondary-300/10 mb-3">
                        <li class="ltr:rounded-l-lg rtl:rounded-r-lg"><a href="#!">Previous</a></li>
                        <li><a href="#!">1</a></li>
                        <li><a href="#!">2</a></li>
                        <li><a href="#!">3</a></li>
                        <li class="ltr:rounded-r-lg rtl:rounded-l-lg"><a href="#!">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</x-dashboard-layout>