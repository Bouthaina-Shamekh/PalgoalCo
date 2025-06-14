<x-dashboard-layout>
  <!-- [ breadcrumb ] start -->
  <div class="page-header">
    <div class="page-block">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page">Analytics</li>
      </ul>
      <div class="page-header-title">
        <h2 class="mb-0">Analytics</h2>
      </div>
    </div>
  </div>
  <!-- [ breadcrumb ] end -->
  <!-- [ Main Content ] start -->
  <div class="grid grid-cols-12 gap-x-6">
    <div class="col-span-12 md:col-span-6 2xl:col-span-3">
      <div class="card">
        <div class="card-body">
          <div class="flex items-center justify-between">
            <h5 class="mb-0">New Orders</h5>
            <select class="form-select form-select-sm w-auto">
                <option>Today</option>
                <option>Weekly</option>
                <option selected>Monthly</option>
              </select>
            </div>
            <div class="my-3">
              <div id="new-orders-graph"></div>
              <h5 class="text-center mt-3">
                $30200
                <small class="text-primary-500">
                  <i class="ti ti-arrow-up-right"></i>
                  30.6%
                </small>
              </h5>
            </div>
            <div class="grid">
              <button class="btn btn-outline-secondary">View more</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-6 2xl:col-span-3">
        <div class="card">
          <div class="card-body">
            <div class="flex items-center justify-between">
              <h5 class="mb-0">New Users</h5>
              <select class="form-select form-select-sm w-auto">
                <option>Today</option>
                <option>Weekly</option>
                <option selected>Monthly</option>
              </select>
            </div>
            <div class="my-3">
              <div id="new-users-graph"></div>
              <h5 class="text-center mt-3">
                $30200
                <small class="text-success-500">
                  <i class="ti ti-arrow-up-right"></i>
                   30.6%
                </small>
              </h5>
            </div>
            <div class="grid">
              <button class="btn btn-outline-secondary">View more</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-6 2xl:col-span-3">
        <div class="card">
          <div class="card-body">
            <div class="flex items-center justify-between">
              <h5 class="mb-0">Visitors</h5>
              <select class="form-select form-select-sm w-auto">
                <option>Today</option>
                <option>Weekly</option>
                <option selected>Monthly</option>
              </select>
            </div>
            <div class="my-3">
              <div id="visitors-graph"></div>
              <h5 class="text-center mt-3">
                $30200 
                <small class="text-danger-500">
                  <i class="ti ti-arrow-down-right"></i>
                   30.6%
                </small>
              </h5>
            </div>
            <div class="grid">
              <button class="btn btn-outline-secondary">View more</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-6 2xl:col-span-3">
        <div class="card bg-gray-800 dropbox-card overflow-hidden">
          <div class="bg-[url('../images/widget/img-dropbox-bg.svg')] opacity-50 absolute inset-0 z-10 bg-right-bottom bg-no-repeat bg-[length:100%]"></div>
        <div class="card-body relative z-20">
          <div class="flex items-center justify-between mb-2">
            <h5 class="text-white">Dropbox Storage</h5>
            <h4 class="text-white">150GB</h4>
          </div>
        <div class="mb-3">
          <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-white bg-opacity-10 text-white">
            <i class="ti ti-cloud text-lg leading-none"></i>
          </div>
        </div>
        <small class="text-white block mb-3">134,2GB of 150GB Users</small>
        <div class="w-full bg-transparent rounded-lg h-2 flex items-center mb-0.5">
          <div class="bg-danger-500 h-full rounded-full" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="bg-warning-500 h-full rounded-full" role="progressbar" aria-label="Segment two" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
          <div class="bg-primary-100 h-full rounded-full" role="progressbar" aria-label="Segment two" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
          <div class="bg-success-500 h-full rounded-full" role="progressbar" aria-label="Segment three" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
        </div>
      </div>
    </div>
    <div class="card bg-primary-500 available-balance-card overflow-hidden">
      <div class="card-body !p-4 bg-[linear-gradient(245deg,transparent_25.46%,rgba(0,0,0,0.2)_68.77%,rgba(0,0,0,0.3)_81.72%)]">
        <div class="flex items-center justify-between">
          <div>
            <p class="mb-0 text-white text-opacity-75">Available Balance</p>
            <h4 class="mb-0 text-white">$1,234.90</h4>
        </div>
        <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-dark-500/10 text-white">
          <i class="ti ti-arrows-left-right text-lg leading-none"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-span-12">
  <div class="card">
    <div class="card-header !pb-0 !pt-2">
      <ul class="flex flex-wrap w-full text-center nav-tabs">
        <li class="group active">
          <a
          href="javascript:void(0);"
          data-pc-toggle="tab"
          data-pc-target="analytics-tab-1"
          class="inline-block mr-6 py-4 transition-all duration-300 ease-linear border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-primary-500 hover:text-primary-500 active:text-primary-500"
          >
          Overview
          </a>
        </li>
        <li class="group">
          <a
          href="javascript:void(0);"
          data-pc-toggle="tab"
          data-pc-target="analytics-tab-2"
          class="inline-block mr-6 py-4 transition-all duration-300 ease-linear border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-primary-500 hover:text-primary-500 active:text-primary-500"
          >
          Marketing
          </a>
        </li>
        <li class="group">
          <a
          href="javascript:void(0);"
          data-pc-toggle="tab"
          data-pc-target="analytics-tab-3"
          class="inline-block mr-6 py-4 transition-all duration-300 ease-linear border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-primary-500 hover:text-primary-500 active:text-primary-500"
          >
          Project
        </a>
      </li>
      <li class="group">
        <a
        href="javascript:void(0);"
        data-pc-toggle="tab"
        data-pc-target="analytics-tab-4"
        class="inline-block mr-6 py-4 transition-all duration-300 ease-linear border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-primary-500 hover:text-primary-500 active:text-primary-500"
        >
        Order
      </a>
    </li>
  </ul>
</div>
<div class="card-body">
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-7 xl:col-span-8">
      <ul class="mb-3 flex flex-wrap items-center justify-end gap-3">
        <li class="list-inline-item">
          <select class="form-select w-auto">
            <option>Today</option>
            <option>Weekly</option>
            <option selected="">Monthly</option>
          </select>
        </li>
        <li class="list-inline-item">
          <a href="#" class="w-10 h-10 rounded-xl inline-flex items-center justify-center btn-link-secondary border border-secondary">
            <i class="ti ti-external-link text-lg leading-none"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="w-10 h-10 rounded-xl inline-flex items-center justify-center btn-link-secondary border border-secondary">
            <i class="ti ti-arrows-diagonal text-lg leading-none"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <div class="dropdown">
            <a
            class="w-10 h-10 rounded-xl inline-flex items-center justify-center btn-link-secondary border border-secondary dropdown-toggle arrow-none"
            href="#"
            data-pc-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >
            <i class="ti ti-dots text-lg leading-none"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Name</a>
            <a class="dropdown-item" href="#">Date</a>
            <a class="dropdown-item" href="#">Ratting</a>
            <a class="dropdown-item" href="#">Unread</a>
          </div>
        </div>
      </li>
    </ul>
    <div class="tab-content">
      <div class="block tab-pane" id="analytics-tab-1"><div id="overview-chart-1"></div></div>
      <div class="hidden tab-pane" id="analytics-tab-2"><div id="overview-chart-2"></div></div>
      <div class="hidden tab-pane" id="analytics-tab-3"><div id="overview-chart-3"></div></div>
      <div class="hidden tab-pane" id="analytics-tab-4"><div id="overview-chart-4"></div></div>
    </div>
  </div>
  <div class="col-span-12 lg:col-span-5 xl:col-span-4">
    <ul class="rounded-lg *:py-4 *:px-[25px] divide-y divide-inherit border-theme-border dark:border-themedark-border">
      <li class="list-group-item">
        <div class="flex items-center">
          <div class="shrink-0">
            <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10 text-secondary-500">
              <i class="ti ti-chart-bar text-xl leading-none"></i>
            </div>
          </div>
          <div class="grow ltr:ml-3 rtl:mr-3">
            <div class="grid grid-cols-12 gap-1">
              <div class="col-span-6">
                <p class="text-muted mb-1">Total Sales</p>
                <h6 class="mb-0">1,800</h6>
              </div>
              <div class="col-span-6 ltr:text-right rtl:text-left">
                <h6 class="mb-1">- 245</h6>
                <p class="text-danger-500 mb-0"><i class="ti ti-arrow-down-left"></i> 30.6%</p>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="flex items-center">
          <div class="shrink-0">
            <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10 text-secondary-500">
              <i class="ti ti-chart-arrows-vertical text-xl leading-none"></i>
            </div>
          </div>
          <div class="grow ltr:ml-3 rtl:mr-3">
            <div class="grid grid-cols-12 gap-1">
              <div class="col-span-6">
                <p class="text-muted mb-1">Revenue</p>
                <h6 class="mb-0">$5667</h6>
              </div>
              <div class="col-span-6 ltr:text-right rtl:text-left">
                <h6 class="mb-1">+$2100</h6>
                <p class="text-success-500 mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="flex items-center">
          <div class="shrink-0">
            <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10 text-secondary-500">
              <i class="ti ti-shopping-cart text-xl leading-none"></i>
            </div>
          </div>
          <div class="grow ltr:ml-3 rtl:mr-3">
            <div class="grid grid-cols-12 gap-1">
              <div class="col-span-6">
                <p class="text-muted mb-1">Abandon Cart</p>
                <h6 class="mb-0">128</h6>
              </div>
              <div class="col-span-6 ltr:text-right rtl:text-left">
                <h6 class="mb-1">-26</h6>
                <p class="text-warning-500 mb-0"><i class="ti ti-arrows-left-right"></i> 5%</p>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="flex items-center">
          <div class="shrink-0">
            <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10 text-secondary-500">
              <i class="ti ti-ad text-xl leading-none"></i>
            </div>
          </div>
          <div class="grow ltr:ml-3 rtl:mr-3">
            <div class="grid grid-cols-12 gap-1">
              <div class="col-span-6">
                <p class="text-muted mb-1">Ads Spent</p>
                <h6 class="mb-0">$2500</h6>
              </div>
              <div class="col-span-6 ltr:text-right rtl:text-left">
                <h6 class="mb-1">$200</h6>
                <p class="text-success-500 mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-12 2xl:col-span-3">
            <div class="grid grid-cols-12 gap-x-6">
              <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="card">
                  <div class="card-body">
                    <div class="flex items-center justify-between mb-3">
                      <div class="w-8 h-8 rounded-xl inline-flex items-center justify-center bg-secondary-500/10 text-secondary-500">
                        <i class="ti ti-currency-dollar text-xl leading-none"></i>
                      </div>
                      <div class="dropdown">
                        <a
                          class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary dropdown-toggle arrow-none"
                          href="#"
                          data-pc-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="ti ti-dots-vertical text-lg leading-none"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#">Name</a>
                          <a class="dropdown-item" href="#">Date</a>
                          <a class="dropdown-item" href="#">Ratting</a>
                          <a class="dropdown-item" href="#">Unread</a>
                        </div>
                      </div>
                    </div>
                    <h5 class="mb-0">$30,200.00</h5>
                    <p class="text-muted mb-0">Income</p>
                    <div class="mt-2">
                      <div id="income-graph"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="card">
                  <div class="card-body">
                    <div class="flex items-center justify-between mb-3">
                      <h5 class="mb-0">Languages support</h5>
                      <div class="dropdown">
                        <a
                          class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary dropdown-toggle arrow-none"
                          href="#"
                          data-pc-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="ti ti-dots-vertical text-lg leading-none"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#">Name</a>
                          <a class="dropdown-item" href="#">Date</a>
                          <a class="dropdown-item" href="#">Ratting</a>
                          <a class="dropdown-item" href="#">Unread</a>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <div class="shrink-0">
                        <div class="w-8 h-8 rounded-xl inline-flex items-center justify-center bg-secondary-500/10 text-secondary-500">
                          <i class="ti ti-arrow-big-right text-lg leading-none"></i>
                        </div>
                      </div>
                      <div class="grow ltr:ml-3 rtl:mr-3">
                        <h6 class="mb-0">Update version <span class="badge bg-success-500/10 text-success-500">V1.1.0</span></h6>
                      </div>
                    </div>
                    <div class="mt-2 mb-3">
                      <div id="languages-graph"></div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                      <div class="col-span-6">
                        <div class="grid"><button class="btn btn-outline-secondary">React</button></div>
                      </div>
                      <div class="col-span-6">
                        <div class="grid"><button class="btn btn-outline-secondary">Angular</button></div>
                      </div>
                      <div class="col-span-6">
                        <div class="grid"><button class="btn btn-outline-secondary">Bootstrap</button></div>
                      </div>
                      <div class="col-span-6">
                        <div class="grid"><button class="btn btn-outline-secondary">MUI</button></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-12 2xl:col-span-6">
            <div class="card">
              <div class="card-body">
                <div class="flex items-center justify-between mb-3">
                  <h5 class="mb-0">Overview Product</h5>
                  <div class="dropdown">
                    <a
                      class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary dropdown-toggle arrow-none"
                      href="#"
                      data-pc-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="ti ti-dots-vertical text-lg leading-none"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">Name</a>
                      <a class="dropdown-item" href="#">Date</a>
                      <a class="dropdown-item" href="#">Ratting</a>
                      <a class="dropdown-item" href="#">Unread</a>
                    </div>
                  </div>
                </div>
                <div class="my-3">
                  <div id="overview-product-graph"></div>
                </div>
                <div class="grid grid-cols-12 gap-3 text-center">
                  <div class="col-span-6 lg:col-span-4 2xl:col-span-4">
                    <div class="p-4 rounded-lg border border-theme-border dark:border-themedark-border">
                      <p class="mb-1 relative inline-block"><span class="rounded-full w-1.5 h-1.5 inline-block bg-dark-500 absolute -left-4 top-2"></span><span>Apps</span></p>
                      <h6 class="mb-0">10+</h6>
                    </div>
                  </div>
                  <div class="col-span-6 lg:col-span-4 2xl:col-span-4">
                    <div class="p-4 rounded-lg border border-theme-border dark:border-themedark-border">
                      <p class="mb-1 relative inline-block"><span class="rounded-full w-1.5 h-1.5 inline-block bg-dark-500 absolute -left-4 top-2"></span><span>Other</span></p>
                      <h6 class="mb-0">5+</h6>
                    </div>
                  </div>
                  <div class="col-span-6 lg:col-span-4 2xl:col-span-4">
                    <div class="p-4 rounded-lg border border-theme-border dark:border-themedark-border">
                      <p class="mb-1 relative inline-block"><span class="rounded-full w-1.5 h-1.5 inline-block bg-dark-500 absolute -left-4 top-2"></span><span>Widgets</span></p>
                      <h6 class="mb-0">150+</h6>
                    </div>
                  </div>
                  <div class="col-span-6 lg:col-span-4 2xl:col-span-4">
                    <div class="p-4 rounded-lg border border-theme-border dark:border-themedark-border">
                      <p class="mb-1 relative inline-block"><span class="rounded-full w-1.5 h-1.5 inline-block bg-dark-500 absolute -left-4 top-2"></span><span>Forms</span></p>
                      <h6 class="mb-0">50+</h6>
                    </div>
                  </div>
                  <div class="col-span-6 lg:col-span-4 2xl:col-span-4">
                    <div class="p-4 rounded-lg border border-theme-border dark:border-themedark-border">
                      <p class="mb-1 relative inline-block"><span class="rounded-full w-1.5 h-1.5 inline-block bg-primary-500 absolute -left-4 top-2"></span><span>Components</span></p>
                      <h6 class="mb-0">200+</h6>
                    </div>
                  </div>
                  <div class="col-span-6 lg:col-span-4 2xl:col-span-4">
                    <div class="p-4 rounded-lg border border-theme-border dark:border-themedark-border">
                      <p class="mb-1 relative inline-block"><span class="rounded-full w-1.5 h-1.5 inline-block bg-primary-500 absolute -left-4 top-2"></span><span>Pages</span></p>
                      <h6 class="mb-0">150+</h6>
                    </div>
                  </div>
                </div>
                <div class="grid grid-cols-12 gap-2 text-center mt-4">
                  <div class="col-span-12 sm:col-span-6">
                    <div class="grid">
                      <button class="btn btn-outline-secondary">View All</button>
                    </div>
                  </div>
                  <div class="col-span-12 sm:col-span-6">
                    <div class="grid">
                      <button class="btn btn-primary">Create new Page</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-12 2xl:col-span-3">
            <div class="grid grid-cols-12 gap-x-6">
              <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="card">
                  <div class="card-body !pb-0">
                    <div class="flex items-center justify-between mb-3">
                      <h5 class="mb-0">Payment History</h5>
                      <a class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                        <i class="ti ti-plus text-lg leading-none"></i>
                      </a>
                    </div>
                  </div>
                  <ul class="rounded-lg *:py-4 *:px-[25px] divide-y divide-inherit border-theme-border dark:border-themedark-border">
                    <li class="list-group-item">
                      <div class="flex align-items-center">
                        <div class="shrink-0">
                          <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10">
                            <img src="../assets/images/widget/img-paypal.png" alt="img" class="img-fluid" />
                          </div>
                        </div>
                        <div class="grow mx-2">
                          <p class="mb-1">Paypal</p>
                          <h6 class="mb-0">+210,000 <small class="text-success-500">+ 30.6%</small></h6>
                        </div>
                        <div class="shrink-0">
                          <div class="dropdown">
                            <a
                              class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary dropdown-toggle arrow-none"
                              href="#"
                              data-pc-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="ti ti-dots-vertical f-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Name</a>
                              <a class="dropdown-item" href="#">Date</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="flex align-items-center">
                        <div class="shrink-0">
                          <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10">
                            <img src="../assets/images/widget/img-gpay.png" alt="img" class="img-fluid" />
                          </div>
                        </div>
                        <div class="grow mx-2">
                          <p class="mb-1">Gpay</p>
                          <h6 class="mb-0">-$2,000 <small class="text-danger-500">- 30.6%</small></h6>
                        </div>
                        <div class="shrink-0">
                          <div class="dropdown">
                            <a
                              class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary dropdown-toggle arrow-none"
                              href="#"
                              data-pc-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="ti ti-dots-vertical f-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Name</a>
                              <a class="dropdown-item" href="#">Date</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="flex align-items-center">
                        <div class="shrink-0">
                          <div class="w-10 h-10 rounded-xl inline-flex items-center justify-center bg-secondary-500/10">
                            <img src="../assets/images/widget/img-phonepay.png" alt="img" class="img-fluid" />
                          </div>
                        </div>
                        <div class="grow mx-2">
                          <p class="mb-1">Phone Pay</p>
                          <h6 class="mb-0">-$2,000 <small class="text-danger-500">- 30.6%</small></h6>
                        </div>
                        <div class="shrink-0">
                          <div class="dropdown">
                            <a
                              class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary dropdown-toggle arrow-none"
                              href="#"
                              data-pc-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="ti ti-dots-vertical f-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Name</a>
                              <a class="dropdown-item" href="#">Date</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="card-footer">
                    <div class="grid">
                      <button class="btn btn-outline-secondary">View all</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="card">
                  <div class="card-body">
                    <div class="flex items-center">
                      <div class="shrink-0">
                        <div class="-my-5 w-[130px]">
                          <div id="total-earning-graph-1"></div>
                        </div>
                      </div>
                      <div class="grow ml-2">
                        <p class="mb-1">Total Earning</p>
                        <h6 class="mb-0">$45,890</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="flex items-center">
                      <div class="shrink-0">
                        <div class="-my-5 w-[130px]">
                          <div id="total-earning-graph-2"></div>
                        </div>
                      </div>
                      <div class="grow ml-2">
                        <p class="mb-1">Total Earning</p>
                        <h6 class="mb-0">$45,890</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->
        <!-- [Page Specific JS] start -->
  @push('scripts')
  <script src="{{asset('assets-dashboard/js/plugins/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/new-orders-graph.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/new-users-graph.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/visitors-graph.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/overview-chart.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/income-graph.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/languages-graph.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/overview-product-graph.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/total-earning-graph-1.js')}}"></script>
  <script src="{{asset('assets-dashboard/js/widgets/total-earning-graph-2.js')}}"></script>
  @endpush
</x-dashboard-layout>