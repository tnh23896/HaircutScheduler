@extends('admin.templates.app')
@section('title', 'Bảng điều khiển')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-12 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thông kê doanh thu
                        </h2>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div class="mb-3 ml-3">
                            <div class="flex">
                                <div>
                                    <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                        {{ number_format($revenue) }} VND
                                    </div>
                                    <div class="mt-0.5 text-slate-500">Tháng này</div>
                                </div>
                                <div
                                    class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                        {{ number_format($lastMonthrevenue) }} VND</div>
                                    <div class="mt-0.5 text-slate-500">Tháng trước</div>
                                </div>
                            </div>
                            <form id="filterFormRevenue" method="POST">
                                @csrf
                                <div class="flex justify-end mt-3">
                                    <select name="month" id="month" class="tom-select w-full tomselected mx-3">
                                        <option value="0" selected="true" class="w-96">Chọn tháng</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="year" id="year" class="tom-select w-full tomselected mx-3">
                                        <option value="0" selected="true" class="w-96">Chọn năm</option>
                                        @for ($year = 1990; $year <= 2030; $year++)
                                            <option value="{{ $year }}">Năm {{ $year }}</option>
                                        @endfor
                                    </select>
                                    <button type="button" id="saveFilterFormRevenue" class="btn btn-secondary mr-1 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="filter"
                                            data-lucide="filter" class="lucide lucide-filter block mx-auto">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3">
                                            </polygon>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="report-chart">
                            <div class="h-[275px]">
                                <canvas id="report-chart" data-filter-data="{{ json_encode($totalRevenue) }}"
                                    class="mt-6 -mb-6" width="486" height="343"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->
            </div>
        </div>
    </div>
@endsection
