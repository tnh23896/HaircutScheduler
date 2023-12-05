@extends('admin.templates.app')
@section('title', 'Thống kê dịch vụ')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6 lg:col-span-6 mt-8">
                    <div class="intro-y h-10 mb-5 flex flex-col lg:flex-row justify-between items-center" style="display: flex;justify-content: space-between">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê dịch vụ
                        </h2>
                        <form id="filterTopService" method="POST">
                            @csrf
                            <div class="flex justify-end">
                                <select name="year" id="year" class="tom-select w-full tomselected mx-3" style="width: 8rem;">
                                    <option value="0" selected="true" class="w-96">Chọn năm</option>
                                    @for ($year = 1990; $year <= 2030; $year++)
                                        <option value="{{ $year }}">Năm {{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="button" id="saveFormService" class="btn btn-secondary mr-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="filter"
                                        data-lucide="filter" class="lucide lucide-filter block mx-auto">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="intro-y box p-5 mt-5">
                        <div class="mt-3">
                            <div class="h-[213px]">
                                <canvas id="report-pies-chart" width="203" height="266"
                                    data-topservice-data="{{ json_encode($topservice) }}"
                                    style="display: block; box-sizing: border-box; height: 212.8px; width: 162.4px;"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8" id="your-chart-container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
