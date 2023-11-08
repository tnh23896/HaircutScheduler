@extends('admin.templates.app')
@section('title', 'Thêm lịch đặt')
@section('css_header_custom')
    <style>
        input[type="radio"]:checked+label>img {
            border: 4px solid #d9842f;
        }

        input[type="radio"]:checked+label>h6 {
            color: #d9842f;
        }

        label.check {
            cursor: pointer;
        }

        label.check input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.check span {
            padding: 7px 14px;
            border: 2px solid #d9842f;
            display: inline-block;
            color: #d9842f;
            border-radius: 3px;
            text-transform: uppercase;
        }

        label.check input:checked+span {
            border-color: #d9842f;
            background-color: #d9842f;
            color: #fff;
        }

        label.check input:disabled+span {
            border-color: #ccc;
            background-color: #ccc;
            color: #fff;
            cursor: default;
        }

        .card-header {
            background-color: #d9842f;
        }

        .collapsible-link::before {
            content: '';
            width: 14px;
            height: 2px;
            background: #333;
            position: absolute;
            top: calc(50% - 1px);
            right: 1rem;
            display: block;
            transition: all 0.3s;
        }

        .collapsible-link::after {
            content: '';
            width: 2px;
            height: 14px;
            background: #333;


            position: absolute;
            top: calc(50% - 7px);
            right: calc(1rem + 6px);
            display: block;
            transition: all 0.3s;
        }

        label.check {
            cursor: pointer;
        }

        label.check input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.check span {
            padding: 7px 14px;
            border: 2px solid #d9842f;
            display: inline-block;
            color: #d9842f;
            border-radius: 3px;
            text-transform: uppercase;
        }

        label.check input:checked+span {
            border-color: #d9842f;
            background-color: #d9842f;
            color: #fff;
        }

        label.check input:disabled+span {
            border-color: #ccc;
            background-color: #ccc;
            color: #fff;
            cursor: default;
        }

        .cursor-pointer {
            background-color: #d9842f;
            height: 30px;
            align-items: center;
            display: flex
        }

        /* //ảnh// */
        .radio-button-with-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .radio-button-with-image input[type="radio"] {
            display: none;
        }

        .radio-button-with-image .image-container {
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50%;
            margin-bottom: 0.5rem;
        }

        .radio-button-with-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .radio-button-with-image div {
            font-size: 1rem;
        }

        .radio-button-with-image input[type="radio"]:checked+.image-container {
            border: 2px solid #d9842f;
        }

        .radio-button-with-image:hover .image-container {
            border: 2px solid #d9842f;
        }

        .my-select {
            width: 200px;
            background-color: #d9842f;
            color: #fff;
            border: 0 none;
            border-radius: 20px;
            padding: 6px 20px;
        }
    </style>
@endsection
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm lịch đặt
        </h2>
    </div>
    <div id="booking" class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form>
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Họ và tên</label>
                        <input id="name" name="name" type="text" class="form-control w-full"
                            placeholder="Họ và tên">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Số điện thoại</label>
                        <input id="phone" name="phone" type="text" class="form-control w-full"
                            placeholder="Số điện thoại">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Email</label>
                        <input id="email" name="email" type="text" class="form-control w-full" placeholder="Email">
                    </div>
                    <div class="mt-3 card">
                        <h2 id="toggleCollapse" class="cursor-pointer">Danh sách dịch vụ</h2>
                        <div id="myCollapse" class="hidden transition-transform transform scale-0">
                            <div class="d-flex flex-wrap px-2 justify-content-between">
                                @foreach ($serviceCategories as $category)
                                    <h2 class="text-lg font-medium mt-2">{{ $category->name }}</h2>
                                    <div class=" grid grid-cols-12 gap-5 mt-5 pt-5 border-t">
                                        @foreach ($category->services as $service)
                                            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                                                <div class="box">
                                                    <div class="p-5">
                                                        <div
                                                            class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                                            <img alt="Midone - HTML Admin Template" class="rounded-md"
                                                                src="{{ asset($service->image) }}">
                                                        </div>
                                                        <div class="text-slate-600 dark:text-slate-500 mt-5">
                                                            <div class="flex items-center"> <i data-lucide="link"
                                                                    class="w-4 h-4 mr-2"></i> Giá: {{ $service->price }} VND
                                                            </div>
                                                            <div class="flex items-center mt-2"> <i data-lucide="layers"
                                                                    class="w-4 h-4 mr-2"></i> {{ $service->name }} </div>
                                                        </div>
                                                        <div
                                                            class="flex justify-center lg:justify-center items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                                            <label class="check mt-1">
                                                                <input type="checkbox" id="service_{{ $service->id }}"
                                                                    name="services[]" value="{{ $service->id }}"
                                                                    data-price="{{ $service->price }}">
                                                                <span type="button" class="btn ">Chọn</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </h2>
                    <div class="mt-3">
                        <h2 id="toggleEmployeeCollapse" class="cursor-pointer">Danh sách nhân viên</h2>
                        <div id="employeeCollapse" class="hidden transition-transform transform scale-0">
                            <div class="flex flex-wrap mt-3">
                                @foreach ($staffMembers as $staff)
                                    <label class="radio-button-with-image text-center mx-2">
                                        <input type="radio" name="admin_id" id="admin_{{ $staff->id }}"
                                            value="{{ $staff->id }}" hidden>
                                        <div class="image-container">
                                            <img src="{{ $staff->avatar }}" alt="{{ $staff->username }}">
                                        </div>
                                        <div class="text-center">{{ $staff->username }}</div>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mt-3 flex flex-col items-center">
                                <label for="crud-form-1" class="form-label text-lg mb-2">Ngày đặt lịch</label>
                                <div class="px-3">
                                    <div class="row">
                                        <div class="col-md-4 mx-auto">
                                            <select class="custom-select my-select" name="day">
                                                @foreach ($availableDates as $date)
                                                    <option value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                                        {{ \Carbon\Carbon::parse($date)->format('\N\g\à\y\ d/m/Y') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 flex flex-col items-center ">
                                <h5 class="text-center text-lg mb-3">Chọn thời gian</h5>
                                <div class="d-flex flex-wrap justify-content-center" id="timeSelect">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-1" class="form-label">Mã giảm giá</label>
                            <input name="promoCode" type="text" class="form-control w-full"
                                placeholder="Mã giảm giá">
                        </div>
                        <div class="mt-5">
                            <h3>Tổng tiền dịch vụ: <span id="totalPrice"> 0 </span> VND</h3>
                        </div>
                    </div>
            </form>
            <div class="mt-3">
                <div class="text-left mt-3">
                    <a href=""> <button type="button" class="btn btn-outline-secondary w-24 mr-1">Danh
                            sách</button></a>
                    <button type="button" id="bookingConfirm" class="btn btn-primary w-24">Lưu</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('input[type="radio"][name="admin_id"]').on('change', function() {
                performAjaxRequest();
            });
            $('#timeSelect').on('change', 'input[type="radio"][name="time_id"]', function() {
                const admin = $('input[type="radio"][name="admin_id"]:checked').val();
                if (!admin) {
                    toastr.error('Vui lòng chọn nhân viên');
                    $('input[type="radio"][name="time_id"]').prop('checked', false);
                }
            });
            $('select[name="day"]').on('change', function() {
                performAjaxRequest();
            });
            $('input[name="services[]"]').on('change', function() {
                // Lấy danh sách các giá trị đã chọn
                var checked = $('input[name="services[]"]:checked');
                var totalPrice = 0;

                checked.each(function() {
                    var price = parseFloat($(this).data('price'));
                    totalPrice += price;
                });

                $('#totalPrice').text(totalPrice.toLocaleString());
            });

            function performAjaxRequest() {
                const data = new FormData();
                const url = "{{ route('admin.scheduleManagement.getStaff') }}";
                const admin_id = $('input[type="radio"][name="admin_id"]:checked').val();
                const day = $('select[name="day"]').val();
                if (admin_id && day) {
                    data.append('admin_id', admin_id);
                    data.append('day', day);
                    // Xóa hiển thị cũ trước khi gửi yêu cầu AJAX
                    $('#timeSelect label').remove();
                    sendAjaxRequest(url, 'post', data,
                        function(response) {
                            renderTimes(response.times);
                        },
                        function(error) {
                            console.log(error);
                            toastr.error(error.responseJSON.message);
                        }
                    );
                }
            }
            function renderTimes(times) {
                $('#timeSelect label').remove();
                if (times.length === 0) {
                    // Nếu không có thời gian, hiển thị trạng thái "rỗng"
                    $('#timeSelect').html('<p>Không có thời gian làm việc trong ngày này.</p>');
                } else {
                    // Nếu có thời gian, thêm thời gian vào #timeSelect
                    times.forEach(function(time) {
                        let checkAvailable = "";
                        if (time.pivot) {
                            checkAvailable = time.pivot.status === 'unavailable' ? 'disabled' : '';
                        }
                        const radioOption = `
                <label class="check mx-1">
                    <input type="radio" id="time_${time.id}" name="time_id" value="${time.id}" ${checkAvailable}>
                    <span>${time.time}</span>
                </label>
            `;
                        $('#timeSelect').append(radioOption);
                    });
                }
            }
            $('#bookingConfirm').on('click', function() {
                const form = new FormData();
                const selectedServices = $('input[name="services[]"]:checked');
                let totalPrice = $('#totalPrice').text();
                const name = $('input[name="name"]').val() || "";
                const selectedRadio = $('input[type="radio"][name="admin_id"]:checked');
                const adminId = selectedRadio.length > 0 ? selectedRadio.val() : "";
                const phone = $('input[name="phone"]').val() || "";
                totalPrice = totalPrice.replace(/,/g, '');
                const email = $('input[name="email"]').val() || "";
                const day = $('select[name="day"]').val() || "";
                const selectedTime = $('input[name="time_id"]:checked');
                const time = selectedTime.length > 0 ? selectedTime.val() : "";
                const promoCode = $('input[name="promoCode"]').val();
                // Khai báo mảng để lưu trữ giá trị của servicesId
                const servicesId = [];
                selectedServices.each(function() {
                    servicesId.push($(this).val());
                });
                // Chuyển mảng servicesId thành chuỗi JSON
                form.append('name', name);
                form.append('admin_id', adminId);
                form.append('phone', phone);
                form.append('total_price', totalPrice);
                form.append('email', email);
                form.append('day', day);
                form.append('time', time);
                promoCode ? form.append('promo_code', promoCode) : "";
                // Thêm chuỗi JSON servicesId vào FormData
                form.append('servicesId', servicesId);
                sendAjaxRequest("{{ route('admin.scheduleManagement.store') }}", 'post', form,
                    response => {
                        toastr.success('Thêm đơn thành công .');
                        console.log(response);
                        location.href = "{{ route('admin.scheduleManagement.index') }}";
                    },
                    error => {
                        showErrors(error);
                    }
                );
            });


        })
        function toggleCollapse(toggleId, collapseId) {
            const toggleElement = document.getElementById(toggleId);
            const collapseElement = document.getElementById(collapseId);
            toggleElement.addEventListener('click', function() {
                if (collapseElement.classList.contains('hidden')) {
                    collapseElement.classList.remove('hidden');
                    collapseElement.classList.add('scale-100');
                } else {
                    collapseElement.classList.remove('scale-100');
                    collapseElement.classList.add('scale-0');
                    setTimeout(() => {
                        collapseElement.classList.add('hidden');
                    }, 300); // Thời gian hoàn thành transition
                }
            });
        }
        // Sử dụng hàm để điều khiển cả danh sách dịch vụ và danh sách nhân viên
        toggleCollapse('toggleCollapse', 'myCollapse');
        toggleCollapse('toggleEmployeeCollapse', 'employeeCollapse');
    </script>




@endsection
