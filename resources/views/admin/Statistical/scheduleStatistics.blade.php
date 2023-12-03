@extends('admin.templates.app')
@section('title', 'Thống kê lịch đặt')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="col-span-12 lg:col-span-4 mt-8">
                <div class="col-span-12 lg:col-span-12">
                    <div class="intro-y h-10 mb-5 flex flex-col lg:flex-row justify-between items-center" style="display: flex;justify-content: space-between">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê lịch đặt
                        </h2>
                        <form id="filterScheduleForm" method="POST" class="flex flex-col lg:flex-row items-center lg:justify-end">
                            @csrf
                            <div class="flex justify-end">
                                <select name="month" id="month" class="tom-select w-full tomselected mx-3 lg:w-auto lg:mx-0 mb-3 lg:mb-0" style="width: 8rem;">
                                    <option value="0" selected="true" class="w-96">Chọn tháng</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">Tháng {{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="year" id="year" class="tom-select w-full tomselected mx-3 lg:w-auto lg:mx-0 mb-3 lg:mb-0" style="width: 8rem;">
                                    <option value="0" selected="true" class="w-96">Chọn năm</option>
                                    @for ($year = 1990; $year <= 2030; $year++)
                                        <option value="{{ $year }}">Năm {{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="button" id="saveForm" class="btn btn-secondary mr-1 mb-2 lg:mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="filter" data-lucide="filter"
                                        class="lucide lucide-filter block mx-auto">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">

                        <div id="vertical-bar-chart" class="p-5">
                            <div class="preview">
                                <div class="h-[400px]">
                                    <canvas id="vertical-chart-widget" data-filtered="{{ json_encode($data) }}">
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
