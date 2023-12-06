@extends('admin.templates.app')
@section('title', 'Thống kê lịch đặt')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="col-span-12 lg:col-span-4 mt-8">
                <div class="col-span-12 lg:col-span-12">
                    <div class="intro-y h-10 mb-5 flex flex-col lg:flex-row justify-between items-center"
                        style="display: flex;justify-content: space-between">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê lịch đặt
                        </h2>
                        <form id="searchTime" method="POST">
                            @csrf
                            <div class="flex items-center">
                                <label for="start_date" class="mr-2">Ngày bắt đầu:</label>
                                <input type="date" style="border-color: #312E81" name="start_date" id="start_date"
                                    class="mx-3 py-2 px-4 border rounded" placeholder="Ngày bắt đầu"
                                    onchange="validateDate()">

                                <label for="end_date" class="mr-2">Ngày kết thúc:</label>
                                <input type="date" style="border-color: #312E81" name="end_date" id="end_date"
                                    class="mx-3 py-2 px-4 border rounded" placeholder="Ngày kết thúc"
                                    onchange="validateDate()">

                                <button type="button" id="saveSearchTime" style="border-color: #312E81"
                                    class="btn btn-secondary mr-1 ">
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
                            <form action="{{ route('admin.schedulestatics.export') }}" method="POST">
                                @csrf
																@foreach ($timeslots as $key => $item)
																<input type="hidden" name="timeslots[{{ $key }}]['time']" value="{{ $item->time }}">
																<input type="hidden" name="timeslots[{{ $key }}]['successful_booking_count']" value="{{ $item->successful_booking_count }}">
																<input type="hidden" name="timeslots[{{ $key }}]['canceled_booking_count']" value="{{ $item->canceled_booking_count }}">
																<input type="hidden" name="timeslots[{{ $key }}]['total_booking_count']" value="{{ $item->total_booking_count }}">
														@endforeach
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

                    <div id="vertical-bar-chart" class="p-5">
                        <div class="preview">
                            <div class="h-[400px]">
                                <canvas id="vertical-chart-widget" data-time-data="{{ json_encode($timeslots) }}">
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
        function validateDate() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            var saveSearchTimeButton = document.getElementById('saveSearchTime');

            if (startDate && endDate && startDate > endDate) {
                toastr.error('Ngày bắt đầu không thể lớn hơn ngày kết thúc.');
                saveSearchTimeButton.disabled = true; // Vô hiệu hóa nút tìm kiếm
            } else {
                toastr.clear(); // Xóa thông báo lỗi nếu có
                saveSearchTimeButton.disabled = false; // Kích hoạt lại nút tìm kiếm
            }
        }
    </script>
@endsection
