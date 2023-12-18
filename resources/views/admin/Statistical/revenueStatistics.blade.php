@extends('admin.templates.app')
@section('title', 'Thống kê doanh thu')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="col-span-12 lg:col-span-4 mt-8">
                <div class="col-span-12 lg:col-span-12">
                    <div class="intro-y h-10 mb-5 flex flex-col lg:flex-row justify-between items-center"
                        style="display: flex;justify-content: space-between">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê doanh thu theo năm
                        </h2>
                        <form id="filterFormRevenue" method="POST">
                            @csrf
                            <div class="flex">
                                <select name="month" id="month" class="tom-select tomselected mx-3"
                                    style="width:8rem;">
                                    <option value="0" selected="true">Chọn tháng</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">Tháng {{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="year" id="year" class="tom-select tomselected mx-3"
                                    style="width:8rem;">
                                    <option value="0" selected="true">Chọn năm</option>
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
                        </form>
                        <div class="ml-2">
                            <form action="{{ route('admin.revenue.export') }}" method="POST">
                                @csrf
                                {{-- @foreach ($totalRevenue as $key => $item)
                                    <input type="hidden" name="totalRevenue[{{ $key }}]['month']"
                                        value="{{ $item['month'] }}">
                                    <input type="hidden" name="totalRevenue[{{ $key }}]['totalRevenues']"
                                        value="{{ $item['totalRevenues'] }}">
                                    <input type="hidden" name="totalRevenue[{{ $key }}]['ca1']"
                                        value="{{ $item['ca1'] }}">
                                    <input type="hidden" name="totalRevenue[{{ $key }}]['ca2']"
                                        value="{{ $item['ca2'] }}">
                                    <input type="hidden" name="totalRevenue[{{ $key }}]['ca3']"
                                        value="{{ $item['ca3'] }}">
                                @endforeach --}}
																<input type="hidden" name="excelYear" id="resultInput" readonly value="0">	
                                <button class="btn btn-primary shadow-md mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="file-text"
                                        data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg> Xuất ra Excel </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="mb-3 ml-3">
                        <div class="flex">
                            <div>
                                <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                    {{ number_format($lastMonthrevenue) }} VND</div>
                                <div class="mt-0.5 text-slate-500">Tháng trước</div>
                            </div>
                            <div
                                class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                            </div>

                            <div>
                                <div class="dark:text-slate-300 text-lg xl:text-xl font-medium">
                                    {{ number_format($revenue) }} VND
                                </div>
                                <div class="mt-0.5 text-slate-500">Tháng này</div>
                            </div>
                        </div>

                    </div>
                    <div id="vertical-bar-chart" class="p-5">
                        <div class="preview">
                            <div class="h-[400px]">
                                <canvas id="verticals-widget" data-filter="{{ json_encode($totalRevenue) }}">
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>


    <script>
			// Get the select element
			var selectElement = document.getElementById('year');

			// Add event listener for change event
			selectElement.addEventListener('change', function() {
					// Get the selected value
					var selectedValue = selectElement.value;

					// Update the input value
					document.getElementById('resultInput').value = selectedValue;
			});
	</script>
@endsection
