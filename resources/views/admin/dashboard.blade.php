@extends('admin.templates.app')
@section('title', 'Bảng điều khiển')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="#" class="ml-auto flex items-center text-primary"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="refresh-ccw" data-lucide="refresh-ccw"
                                class="lucide lucide-refresh-ccw w-4 h-4 mr-3">
                                <path d="M3 2v6h6"></path>
                                <path d="M21 12A9 9 0 006 5.3L3 8"></path>
                                <path d="M21 22v-6h-6"></path>
                                <path d="M3 12a9 9 0 0015 6.7l3-2.7"></path>
                            </svg> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart"
                                            data-lucide="shopping-cart"
                                            class="lucide lucide-shopping-cart report-box__icon text-primary">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                                        </svg>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> 33% <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="chevron-up" data-lucide="chevron-up"
                                                    class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                    <div class="text-base text-slate-500 mt-1">Item Sales</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card"
                                            data-lucide="credit-card"
                                            class="lucide lucide-credit-card report-box__icon text-pending">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                            </rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer"> 2% <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="chevron-down" data-lucide="chevron-down"
                                                    class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                    <div class="text-base text-slate-500 mt-1">New Orders</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="monitor"
                                            data-lucide="monitor"
                                            class="lucide lucide-monitor report-box__icon text-warning">
                                            <rect x="2" y="3" width="20" height="14" rx="2"
                                                ry="2"></rect>
                                            <line x1="8" y1="21" x2="16" y2="21"></line>
                                            <line x1="12" y1="17" x2="12" y2="21"></line>
                                        </svg>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> 12% <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="chevron-up" data-lucide="chevron-up"
                                                    class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                    <div class="text-base text-slate-500 mt-1">Total Products</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="user"
                                            data-lucide="user" class="lucide lucide-user report-box__icon text-success">
                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> 22% <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="chevron-up" data-lucide="chevron-up"
                                                    class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                    <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-6 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Sales Report
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="calendar" data-lucide="calendar"
                                class="lucide lucide-calendar w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                        </div>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">$15,000
                                    </div>
                                    <div class="mt-0.5 text-slate-500">This Month</div>
                                </div>
                                <div
                                    class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-slate-500 text-lg xl:text-xl font-medium">$10,000</div>
                                    <div class="mt-0.5 text-slate-500">Last Month</div>
                                </div>
                            </div>
                            <div class="dropdown md:ml-auto mt-5 md:mt-0">
                                <button class="dropdown-toggle btn btn-outline-secondary font-normal"
                                    aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down"
                                        data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-2">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg> </button>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content overflow-y-auto h-32">
                                        <li><a href="#" class="dropdown-item">PC &amp; Laptop</a></li>
                                        <li><a href="#" class="dropdown-item">Smartphone</a></li>
                                        <li><a href="#" class="dropdown-item">Electronic</a></li>
                                        <li><a href="#" class="dropdown-item">Photography</a></li>
                                        <li><a href="#" class="dropdown-item">Sport</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="report-chart">
                            <div class="h-[275px]">
                                <canvas id="report-line-chart" class="mt-6 -mb-6" width="486" height="343"
                                    style="display: block; box-sizing: border-box; height: 274.4px; width: 388.8px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->
                <!-- BEGIN: Weekly Top Seller -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Weekly Top Seller
                        </h2>
                        <a href="#" class="ml-auto text-primary truncate">Show More</a>
                    </div>
                    <div class="intro-y box p-5 mt-5">
                        <div class="mt-3">
                            <div class="h-[213px]">
                                <canvas id="report-pie-chart" width="203" height="266"
                                    style="display: block; box-sizing: border-box; height: 212.8px; width: 162.4px;"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span class="truncate">17 - 30 Years old</span> <span
                                    class="font-medium ml-auto">62%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span class="truncate">31 - 50 Years old</span> <span
                                    class="font-medium ml-auto">33%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                <span class="truncate">&gt;= 50 Years old</span> <span
                                    class="font-medium ml-auto">10%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Seller -->
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Sales Report
                        </h2>
                        <a href="#" class="ml-auto text-primary truncate">Show More</a>
                    </div>
                    <div class="intro-y box p-5 mt-5">
                        <div class="mt-3">
                            <div class="h-[213px]">
                                <canvas id="report-donut-chart" width="203" height="266"
                                    style="display: block; box-sizing: border-box; height: 212.8px; width: 162.4px;"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span class="truncate">17 - 30 Years old</span> <span
                                    class="font-medium ml-auto">62%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span class="truncate">31 - 50 Years old</span> <span
                                    class="font-medium ml-auto">33%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                <span class="truncate">&gt;= 50 Years old</span> <span
                                    class="font-medium ml-auto">10%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->
                <!-- BEGIN: Official Store -->
                <div class="col-span-12 xl:col-span-8 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Official Store
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="map-pin" data-lucide="map-pin"
                                class="lucide lucide-map-pin w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <input type="text" class="form-control sm:w-56 box pl-10" placeholder="Filter by city">
                        </div>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div>250 Official stores in 21 countries, click the marker to see location details.</div>
                        <div class="report-maps mt-5 bg-slate-200 rounded-md leaflet [&amp;_.leaflet-tile-pane]:grayscale [&amp;_.leaflet-tile-pane]:invert [&amp;_.leaflet-tile-pane]:brightness-90 [&amp;_.leaflet-tile-pane]:hue-rotate-15 leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
                            data-center="-6.2425342, 106.8626478" data-sources="/dist/json/location.json" tabindex="0"
                            style="position: relative;">
                            <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);">
                                <div class="leaflet-pane leaflet-tile-pane">
                                    <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                        <div class="leaflet-tile-container leaflet-zoom-animated"
                                            style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/407/264@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(18px, -74px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/408/264@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(274px, -74px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/407/265@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(18px, 182px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/408/265@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(274px, 182px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/406/264@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(-238px, -74px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/409/264@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(530px, -74px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/406/265@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(-238px, 182px, 0px); opacity: 1;"><img
                                                alt=""
                                                src="https://tile.thunderforest.com/atlas/9/409/265@2x.png?apikey=1e86fd5a7f60486a8e899411776f60d5"
                                                class="leaflet-tile leaflet-tile-loaded"
                                                style="width: 256px; height: 256px; transform: translate3d(530px, 182px, 0px); opacity: 1;">
                                        </div>
                                    </div>
                                </div>
                                <div class="leaflet-pane leaflet-overlay-pane"></div>
                                <div class="leaflet-pane leaflet-shadow-pane"></div>
                                <div class="leaflet-pane leaflet-marker-pane"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 15" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(495px, 216px, 0px); z-index: 216;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 16" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(352px, 166px, 0px); z-index: 166;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 52" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(264px, 313px, 0px); z-index: 313;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 55" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(880px, 332px, 0px); z-index: 332;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 56" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(-13px, 79px, 0px); z-index: 79;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 58" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(767px, 550px, 0px); z-index: 550;">
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(216px, 184px, 0px); z-index: 184;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 91" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(314px, 172px, 0px); z-index: 172;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 97" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(5px, 105px, 0px); z-index: 105;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 110" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(643px, 501px, 0px); z-index: 501;"><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 131" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(258px, 213px, 0px); z-index: 213;">
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(270px, 247px, 0px); z-index: 247;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(411px, 166px, 0px); z-index: 166;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(285px, 125px, 0px); z-index: 125;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                5</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(541px, 410px, 0px); z-index: 410;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(209px, 124px, 0px); z-index: 124;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                4</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div><img
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIzMS4wNjMiIHZpZXdCb3g9IjAgMCAyMCAzMS4wNjMiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTYiIGRhdGEtbmFtZT0iR3JvdXAgMTYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MDggLTE1MC4wMDEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IlN1YnRyYWN0aW9uXzIxIiBkYXRhLW5hbWU9IlN1YnRyYWN0aW9uIDIxIiBkPSJNMTAsMzEuMDY0aDBMMS40NjIsMTUuMjA4QTEwLDEwLDAsMSwxLDIwLDEwYTkuOSw5LjksMCwwLDEtMS4wNzgsNC41MjJsLS4wNTYuMTA4Yy0uMDM3LjA3MS0uMDc3LjE0Ni0uMTIxLjIyM0wxMCwzMS4wNjJaTTEwLDJhOCw4LDAsMSwwLDgsOCw4LDgsMCwwLDAtOC04WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDA4IDE1MCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8Y2lyY2xlIGlkPSJFbGxpcHNlXzI2IiBkYXRhLW5hbWU9IkVsbGlwc2UgMjYiIGN4PSI2IiBjeT0iNiIgcj0iNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDEyIDE1NCkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAxKSIvPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAg"
                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        title="Official Store 147" alt="Marker" tabindex="0" role="button"
                                        style="margin-left: -10px; margin-top: -35px; transform: translate3d(272px, 175px, 0px); z-index: 175;">
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(618px, 421px, 0px); z-index: 421;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(493px, 374px, 0px); z-index: 374;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                    <div class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                        tabindex="0" role="button"
                                        style="margin-left: -20px; margin-top: -45px; width: 42px; height: 42px; transform: translate3d(148px, 144px, 0px); z-index: 144;">
                                        <div class="relative w-full h-full">
                                            <div
                                                class="absolute inset-0 flex items-center justify-center ml-1.5 mb-0.5 font-medium text-white">
                                                2</div>
                                            <img class="w-full h-full"
                                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NS4wNjYiIGhlaWdodD0iNDcuNjkxIiB2aWV3Qm94PSIwIDAgNTUuMDY2IDQ3LjY5MSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTUiIGRhdGEtbmFtZT0iR3JvdXAgMTUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMTkuNDY3IC04My45OTEpIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTQiIGRhdGEtbmFtZT0iR3JvdXAgMTQiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGlkPSJJbnRlcnNlY3Rpb25fNCIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82IiBkYXRhLW5hbWU9IkludGVyc2VjdGlvbiA2IiBkPSJNNy45ODIsMTAuN2EyMi45NzgsMjIuOTc4LDAsMCwxLDMwLjMxMywwbC0yLDIuNjc5YTE5LjY1MiwxOS42NTIsMCwwLDAtMjYuMzE2LDBaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMjMuODYxIDc4Ljk5OSkiIGZpbGw9InJnYig3NCA5MCAxMjEgLyAwLjYpIiBvcGFjaXR5PSIwLjQ1MyIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXBfMTMiIGRhdGEtbmFtZT0iR3JvdXAgMTMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQyNy44MDYgNDYxLjA2MSkgcm90YXRlKC0xMjApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzQtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNCIgZD0iTTEyLjc4OSwxNy4xNDNhMTUsMTUsMCwwLDEsMjAuNywwbC0xLjYsMi4xNDEtLjAxOC0uMDE4YTEyLjM1MiwxMi4zNTIsMCwwLDAtMTcuNDY5LDBsLS4wMTguMDE4WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC44NDUiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzUtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNSIgZD0iTTEwLjM4NCwxMy45MTlhMTksMTksMCwwLDEsMjUuNTExLDBsLTIuMDE2LDIuN2ExNS42NDcsMTUuNjQ3LDAsMCwwLTIxLjQ3OSwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC42NTIiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBpZD0iSW50ZXJzZWN0aW9uXzYtMiIgZGF0YS1uYW1lPSJJbnRlcnNlY3Rpb24gNiIgZD0iTTcuOTgyLDEwLjdhMjIuOTc4LDIyLjk3OCwwLDAsMSwzMC4zMTMsMGwtMiwyLjY3OWExOS42NTIsMTkuNjUyLDAsMCwwLTI2LjMxNiwwWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzIzLjg2MSA3OC45OTkpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIgb3BhY2l0eT0iMC40NTMiLz4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNpcmNsZSBpZD0iRWxsaXBzZV85IiBkYXRhLW5hbWU9IkVsbGlwc2UgOSIgY3g9IjExIiBjeT0iMTEiIHI9IjExIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMzYgOTYpIiBmaWxsPSJyZ2IoNzQgOTAgMTIxIC8gMC42KSIvPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJHcm91cF8xMiIgZGF0YS1uYW1lPSJHcm91cCAxMiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEzLjE5NCAtMTM5Ljk2KSByb3RhdGUoMTIwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl80LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDQiIGQ9Ik0xMi43ODksMTcuMTQzYTE1LDE1LDAsMCwxLDIwLjcsMGwtMS42LDIuMTQxLS4wMTgtLjAxOGExMi4zNTIsMTIuMzUyLDAsMCwwLTE3LjQ2OSwwbC0uMDE4LjAxOFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuODQ1Ii8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl81LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDUiIGQ9Ik0xMC4zODQsMTMuOTE5YTE5LDE5LDAsMCwxLDI1LjUxMSwwbC0yLjAxNiwyLjdhMTUuNjQ3LDE1LjY0NywwLDAsMC0yMS40NzksMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNjUyIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggaWQ9IkludGVyc2VjdGlvbl82LTMiIGRhdGEtbmFtZT0iSW50ZXJzZWN0aW9uIDYiIGQ9Ik03Ljk4MiwxMC43YTIyLjk3OCwyMi45NzgsMCwwLDEsMzAuMzEzLDBsLTIsMi42NzlhMTkuNjUyLDE5LjY1MiwwLDAsMC0yNi4zMTYsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMyMy44NjEgNzguOTk5KSIgZmlsbD0icmdiKDc0IDkwIDEyMSAvIDAuNikiIG9wYWNpdHk9IjAuNDUzIi8+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zdmc+CiAgICAgICAgICAgICAgICAgICAgICAgIA==">
                                        </div>
                                    </div>
                                </div>
                                <div class="leaflet-pane leaflet-tooltip-pane"></div>
                                <div class="leaflet-pane leaflet-popup-pane"></div>
                                <div class="leaflet-proxy leaflet-zoom-animated"></div>
                            </div>
                            <div class="leaflet-control-container">
                                <div class="leaflet-top leaflet-left">
                                    <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a
                                            class="leaflet-control-zoom-in" href="#" title="Zoom in"
                                            role="button" aria-label="Zoom in" aria-disabled="false"><span
                                                aria-hidden="true">+</span></a><a class="leaflet-control-zoom-out"
                                            href="#" title="Zoom out" role="button" aria-label="Zoom out"
                                            aria-disabled="false"><span aria-hidden="true">−</span></a></div>
                                </div>
                                <div class="leaflet-top leaflet-right"></div>
                                <div class="leaflet-bottom leaflet-left"></div>
                                <div class="leaflet-bottom leaflet-right">
                                    <div class="leaflet-control-attribution leaflet-control"><a
                                            href="https://leafletjs.com"
                                            title="A JavaScript library for interactive maps"><svg aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="12" height="8"
                                                viewBox="0 0 12 8" class="leaflet-attribution-flag">
                                                <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                                                <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                                                <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                                            </svg> Leaflet</a> <span aria-hidden="true">|</span> Map data © OpenStreetMap
                                        contributors, Tiles © Thunderforest</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Official Store -->
                <!-- BEGIN: Weekly Best Sellers -->
                <div class="col-span-12 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Weekly Best Sellers
                        </h2>
                    </div>
                    <div class="mt-5">
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-9.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Kevin Spacey</div>
                                    <div class="text-slate-500 text-xs mt-0.5">27 June 2020</div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    137 Sales</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-5.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Angelina Jolie</div>
                                    <div class="text-slate-500 text-xs mt-0.5">28 June 2020</div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    137 Sales</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-8.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Angelina Jolie</div>
                                    <div class="text-slate-500 text-xs mt-0.5">17 December 2022</div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    137 Sales</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-2.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Al Pacino</div>
                                    <div class="text-slate-500 text-xs mt-0.5">16 July 2021</div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    137 Sales</div>
                            </div>
                        </div>
                        <a href="#"
                            class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                            More</a>
                    </div>
                </div>
                <!-- END: Weekly Best Sellers -->
                <!-- BEGIN: General Report -->
                <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                    <div class="col-span-12 lg:col-span-12">
                        <!-- BEGIN: Vertical Bar Chart -->
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê đơn theo thời gian
                        </h2>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="">
                                <form id="filterForm" method="POST">
                                    @csrf
                                    <div class="flex justify-between">
                                        <select name="month" id="month" class="tom-select w-full tomselected mx-3">
                                            <option value="0" selected="true">Chọn tháng</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">Tháng {{ $i }}</option>
                                            @endfor
                                        </select>
                                        <select name="year" id="year" class="tom-select w-full tomselected mx-3">
                                            <option value="0" selected="true">Chọn năm</option>
                                            @for ($year = 1990; $year <= 2030; $year++)
                                                <option value="{{ $year }}">Năm {{ $year }}</option>
                                            @endfor
                                        </select>
                                        <button type="button" id="saveBtn" class="btn btn-secondary mr-1 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                icon-name="filter" data-lucide="filter"
                                                class="lucide lucide-filter block mx-auto">
                                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div id="vertical-bar-chart" class="p-5">
                                <div class="preview">
                                    <div class="h-[400px]">
                                        <canvas id="vertical-bar-chart-widget"
                                            data-filtered-data="{{ json_encode($data) }}">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Vertical Bar Chart -->
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Weekly Top Products
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="file-text" data-lucide="file-text"
                                    class="lucide lucide-file-text hidden sm:block w-4 h-4 mr-2">
                                    <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <line x1="10" y1="9" x2="8" y2="9"></line>
                                </svg> Export to Excel </button>
                            <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="file-text" data-lucide="file-text"
                                    class="lucide lucide-file-text hidden sm:block w-4 h-4 mr-2">
                                    <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <line x1="10" y1="9" x2="8" y2="9"></line>
                                </svg> Export to PDF </button>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">IMAGES</th>
                                    <th class="whitespace-nowrap">PRODUCT NAME</th>
                                    <th class="text-center whitespace-nowrap">STOCK</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-7.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-3.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-13.jpg">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-medium whitespace-nowrap">Nike Air Max 270</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Sport &amp; Outdoor
                                        </div>
                                    </td>
                                    <td class="text-center">60</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                icon-name="check-square" data-lucide="check-square"
                                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg> Active </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="check-square" data-lucide="check-square"
                                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg> Edit </a>
                                            <a class="flex items-center text-danger" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="trash-2" data-lucide="trash-2"
                                                    class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                </svg> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-12.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-13.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-8.jpg">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-medium whitespace-nowrap">Samsung Galaxy S20
                                            Ultra</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Smartphone &amp;
                                            Tablet</div>
                                    </td>
                                    <td class="text-center">50</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                icon-name="check-square" data-lucide="check-square"
                                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg> Active </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="check-square" data-lucide="check-square"
                                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg> Edit </a>
                                            <a class="flex items-center text-danger" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="trash-2" data-lucide="trash-2"
                                                    class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                </svg> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-13.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-4.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-5.jpg">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-medium whitespace-nowrap">Apple MacBook Pro 13</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                    </td>
                                    <td class="text-center">163</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                icon-name="check-square" data-lucide="check-square"
                                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg> Active </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="check-square" data-lucide="check-square"
                                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg> Edit </a>
                                            <a class="flex items-center text-danger" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="trash-2" data-lucide="trash-2"
                                                    class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                </svg> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-5.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-1.jpg">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                    src="dist/images/preview-3.jpg">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-medium whitespace-nowrap">Samsung Q90 QLED TV</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Electronic</div>
                                    </td>
                                    <td class="text-center">132</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                icon-name="check-square" data-lucide="check-square"
                                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg> Active </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="check-square" data-lucide="check-square"
                                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11">
                                                    </path>
                                                </svg> Edit </a>
                                            <a class="flex items-center text-danger" href="#"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    icon-name="trash-2" data-lucide="trash-2"
                                                    class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10"
                                                        y2="17"></line>
                                                    <line x1="14" y1="11" x2="14"
                                                        y2="17"></line>
                                                </svg> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" icon-name="chevrons-left"
                                            class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                            <polyline points="11 17 6 12 11 7"></polyline>
                                            <polyline points="18 17 13 12 18 7"></polyline>
                                        </svg> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" icon-name="chevron-left"
                                            class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg> </a>
                                </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" icon-name="chevron-right"
                                            class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" icon-name="chevrons-right"
                                            class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right">
                                            <polyline points="13 17 18 12 13 7"></polyline>
                                            <polyline points="6 17 11 12 6 7"></polyline>
                                        </svg> </a>
                                </li>
                            </ul>
                        </nav>
                        <select class="w-20 form-select box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: Transactions -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Transactions
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-9.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Kevin Spacey</div>
                                        <div class="text-slate-500 text-xs mt-0.5">27 June 2020</div>
                                    </div>
                                    <div class="text-success">+$30</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-5.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Angelina Jolie</div>
                                        <div class="text-slate-500 text-xs mt-0.5">28 June 2020</div>
                                    </div>
                                    <div class="text-success">+$50</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-8.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Angelina Jolie</div>
                                        <div class="text-slate-500 text-xs mt-0.5">17 December 2022</div>
                                    </div>
                                    <div class="text-success">+$28</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-2.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Al Pacino</div>
                                        <div class="text-slate-500 text-xs mt-0.5">16 July 2021</div>
                                    </div>
                                    <div class="text-success">+$156</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-11.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Robert De Niro</div>
                                        <div class="text-slate-500 text-xs mt-0.5">9 February 2021</div>
                                    </div>
                                    <div class="text-success">+$33</div>
                                </div>
                            </div>
                            <a href="#"
                                class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                                More</a>
                        </div>
                    </div>
                    <!-- END: Transactions -->
                    <!-- BEGIN: Recent Activities -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Recent Activities
                            </h2>
                            <a href="#" class="ml-auto text-primary truncate">Show More</a>
                        </div>
                        <div
                            class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
                            <div class="intro-x relative flex items-center mb-3">
                                <div
                                    class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-5.jpg">
                                    </div>
                                </div>
                                <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                    <div class="flex items-center">
                                        <div class="font-medium">Morgan Freeman</div>
                                        <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                    </div>
                                    <div class="text-slate-500 mt-1">Has joined the team</div>
                                </div>
                            </div>
                            <div class="intro-x relative flex items-center mb-3">
                                <div
                                    class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-12.jpg">
                                    </div>
                                </div>
                                <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                    <div class="flex items-center">
                                        <div class="font-medium">Denzel Washington</div>
                                        <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                    </div>
                                    <div class="text-slate-500">
                                        <div class="mt-1">Added 3 new photos</div>
                                        <div class="flex mt-2">
                                            <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in">
                                                <img alt="Midone - HTML Admin Template"
                                                    class="rounded-md border border-white"
                                                    src="dist/images/preview-1.jpg">
                                            </div>
                                            <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in">
                                                <img alt="Midone - HTML Admin Template"
                                                    class="rounded-md border border-white"
                                                    src="dist/images/preview-2.jpg">
                                            </div>
                                            <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in">
                                                <img alt="Midone - HTML Admin Template"
                                                    class="rounded-md border border-white"
                                                    src="dist/images/preview-3.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-x text-slate-500 text-xs text-center my-4">12 November</div>
                            <div class="intro-x relative flex items-center mb-3">
                                <div
                                    class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-7.jpg">
                                    </div>
                                </div>
                                <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                    <div class="flex items-center">
                                        <div class="font-medium">Kate Winslet</div>
                                        <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                    </div>
                                    <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                            href="#">Nike Tanjun</a> price and description</div>
                                </div>
                            </div>
                            <div class="intro-x relative flex items-center mb-3">
                                <div
                                    class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-13.jpg">
                                    </div>
                                </div>
                                <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                    <div class="flex items-center">
                                        <div class="font-medium">Morgan Freeman</div>
                                        <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                    </div>
                                    <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                            href="#">Nike Tanjun</a> description</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Recent Activities -->
                    <!-- BEGIN: Important Notes -->
                    <div
                        class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                Important Notes
                            </h2>
                            <button data-carousel="important-notes" data-target="prev"
                                class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left"
                                    data-lucide="chevron-left" class="lucide lucide-chevron-left w-4 h-4">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg> </button>
                            <button data-carousel="important-notes" data-target="next"
                                class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right"
                                    data-lucide="chevron-right" class="lucide lucide-chevron-right w-4 h-4">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg> </button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tns-outer" id="important-notes-ow"><button type="button"
                                        data-action="stop"><span class="tns-visually-hidden">stop
                                            animation</span>stop</button>
                                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite"
                                        aria-atomic="true">slide <span class="current">3</span> of 3</div>
                                    <div id="important-notes-mw" class="tns-ovh">
                                        <div class="tns-inner" id="important-notes-iw">
                                            <div class="tiny-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                                id="important-notes" style="transform: translate3d(-40%, 0px, 0px);">
                                                <div class="p-5 tns-item tns-slide-cloned" aria-hidden="true"
                                                    tabindex="-1">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                        been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5 tns-item" id="important-notes-item0"
                                                    aria-hidden="true" tabindex="-1">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                        been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5 tns-item tns-slide-active" id="important-notes-item1">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                        been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5 tns-item" id="important-notes-item2"
                                                    aria-hidden="true" tabindex="-1">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                        been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5 tns-item tns-slide-cloned" aria-hidden="true"
                                                    tabindex="-1">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                        been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                    <!-- BEGIN: Schedules -->
                    <div
                        class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Schedules
                            </h2>
                            <a href="#" class="ml-auto text-primary truncate flex items-center"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="plus"
                                    data-lucide="plus" class="lucide lucide-plus w-4 h-4 mr-1">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg> Add New Schedules </a>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x box">
                                <div class="p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            icon-name="chevron-left" data-lucide="chevron-left"
                                            class="lucide lucide-chevron-left w-5 h-5 text-slate-500">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                        <div class="font-medium text-base mx-auto">April</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            icon-name="chevron-right" data-lucide="chevron-right"
                                            class="lucide lucide-chevron-right w-5 h-5 text-slate-500">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </div>
                                    <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                                        <div class="font-medium">Su</div>
                                        <div class="font-medium">Mo</div>
                                        <div class="font-medium">Tu</div>
                                        <div class="font-medium">We</div>
                                        <div class="font-medium">Th</div>
                                        <div class="font-medium">Fr</div>
                                        <div class="font-medium">Sa</div>
                                        <div class="py-0.5 rounded relative text-slate-500">29</div>
                                        <div class="py-0.5 rounded relative text-slate-500">30</div>
                                        <div class="py-0.5 rounded relative text-slate-500">31</div>
                                        <div class="py-0.5 rounded relative">1</div>
                                        <div class="py-0.5 rounded relative">2</div>
                                        <div class="py-0.5 rounded relative">3</div>
                                        <div class="py-0.5 rounded relative">4</div>
                                        <div class="py-0.5 rounded relative">5</div>
                                        <div class="py-0.5 bg-success/20 dark:bg-success/30 rounded relative">6</div>
                                        <div class="py-0.5 rounded relative">7</div>
                                        <div class="py-0.5 bg-primary text-white rounded relative">8</div>
                                        <div class="py-0.5 rounded relative">9</div>
                                        <div class="py-0.5 rounded relative">10</div>
                                        <div class="py-0.5 rounded relative">11</div>
                                        <div class="py-0.5 rounded relative">12</div>
                                        <div class="py-0.5 rounded relative">13</div>
                                        <div class="py-0.5 rounded relative">14</div>
                                        <div class="py-0.5 rounded relative">15</div>
                                        <div class="py-0.5 rounded relative">16</div>
                                        <div class="py-0.5 rounded relative">17</div>
                                        <div class="py-0.5 rounded relative">18</div>
                                        <div class="py-0.5 rounded relative">19</div>
                                        <div class="py-0.5 rounded relative">20</div>
                                        <div class="py-0.5 rounded relative">21</div>
                                        <div class="py-0.5 rounded relative">22</div>
                                        <div class="py-0.5 bg-pending/20 dark:bg-pending/30 rounded relative">23</div>
                                        <div class="py-0.5 rounded relative">24</div>
                                        <div class="py-0.5 rounded relative">25</div>
                                        <div class="py-0.5 rounded relative">26</div>
                                        <div class="py-0.5 bg-primary/10 dark:bg-primary/50 rounded relative">27</div>
                                        <div class="py-0.5 rounded relative">28</div>
                                        <div class="py-0.5 rounded relative">29</div>
                                        <div class="py-0.5 rounded relative">30</div>
                                        <div class="py-0.5 rounded relative text-slate-500">1</div>
                                        <div class="py-0.5 rounded relative text-slate-500">2</div>
                                        <div class="py-0.5 rounded relative text-slate-500">3</div>
                                        <div class="py-0.5 rounded relative text-slate-500">4</div>
                                        <div class="py-0.5 rounded relative text-slate-500">5</div>
                                        <div class="py-0.5 rounded relative text-slate-500">6</div>
                                        <div class="py-0.5 rounded relative text-slate-500">7</div>
                                        <div class="py-0.5 rounded relative text-slate-500">8</div>
                                        <div class="py-0.5 rounded relative text-slate-500">9</div>
                                    </div>
                                </div>
                                <div class="border-t border-slate-200/60 p-5">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                        <span class="truncate">UI/UX Workshop</span> <span
                                            class="font-medium xl:ml-auto">23th</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                        <span class="truncate">VueJs Frontend Development</span> <span
                                            class="font-medium xl:ml-auto">10th</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                        <span class="truncate">Laravel Rest API</span> <span
                                            class="font-medium xl:ml-auto">31th</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Schedules -->
                </div>
            </div>
        </div>
    </div>
@endsection
