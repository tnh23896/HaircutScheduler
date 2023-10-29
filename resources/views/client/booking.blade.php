@extends('client.templates.app')
@section('title', 'Đặt lịch cắt tóc')
@section('css_header_custom')
    <style>
        .top-50 {
            top: 50%;
            transform: translateY(-100%);
        }

        .right-0 {
            right: 0;
        }

        #phoneHeading,
        #serviceHeading,
        #staffHeading {
            background-color: #d9842f;
            color: #fff;
        }

        #employee_list {
            overflow: hidden;
        }

        @media (max-width: 768px) {
            #employee_list {
                overflow: scroll;
            }
        }

        input[type="radio"]~label {
            padding: 5px 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        input[type="radio"]:checked+label>img {
            border: 4px solid #d9842f;
        }

        input[type="radio"]:checked+label>h6 {
            color: #d9842f;
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

        /* Vertical line */
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

        .collapsible-link[aria-expanded='true']::after {
            transform: rotate(90deg) translateX(-1px);
        }

        .collapsible-link[aria-expanded='true']::before {
            transform: rotate(180deg);
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

        label:not(.input-group-text) {
            margin-top: 10px;
        }

        .my-select {
            background-color: #d9842f;
            color: #fff;
            border: 0 none;
            border-radius: 20px;
            padding: 6px 20px;
        }

        @media (max-width: 768px) {
            .card span {
                font-size: 15px;
            }

        }
    </style>
@endsection
@section('content')
    <section class="my-5 p-0 barber-con gap no-bottom">
        <div class="heading-style text-center">
            <h2>Đặt lịch cắt tóc</h2>
            <div class="scissor-border position-relative">
                <span class="mt-0"><svg fill="#332b23" height="20" viewBox="0 0 64 64"
                        xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z" />
                            <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z" />
                            <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z" />
                            <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z" />
                            <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z" />
                            <path d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z" />
                            <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z" />
                            <path
                                d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                            <path
                                d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z" />
                            <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z" />
                            <path
                                d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                        </g>
                    </svg></span>
            </div>
        </div>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <!-- Accordion -->
                        <div id="booking" class="accordion shadow">
                            @if (!auth('web')->check())
                                <!-- begin phone card -->
                                <div class="card">
                                    <div id="phoneHeading" class="card-header shadow-sm border-0">
                                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                                data-target="#phoneContent" aria-expanded="true"
                                                aria-controls="phoneContent"
                                                class="d-block position-relative text-white text-uppercase collapsible-link py-2">#1
                                                Xác thực số điện thoại </a></h6>
                                    </div>
                                    <div id="phoneContent" aria-labelledby="phoneHeading" data-parent="#booking"
                                        class="collapse show">
                                        <!-- form send otp -->
                                        <div class="container my-3" style="max-width: 550px">
                                            <div class="alert alert-danger error" id="" style="display: none;">
                                            </div>
                                            <h3>Xác thực số điện thoại</h3>
                                            <div class="alert alert-success successAuth" id=""
                                                style="display: none;">
                                            </div>
                                            <form class="formSendOtp">
                                                <label>Số điện thoại:</label>
                                                <input type="text" id="phoneOtpInput" name="phoneOtpNumberInput"
                                                    class="form-control " placeholder="+84********">
                                                <div id="recaptcha-container" class="mt-3"></div>
                                                <button class="btn btn-primary mt-3">Gửi OTP</button>
                                            </form>
                                        </div>
                                        <!-- end form send otp -->
                                    </div>
                                </div>
                                <!-- end phone card -->
                            @endif
                            <!-- begin service card -->
                            <div class="card">
                                <div id="serviceHeading" class="card-header shadow-sm border-0">
                                    <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                            data-target="#serviceContent" aria-expanded="false"
                                            aria-controls="serviceContent"
                                            class="d-block position-relative text-white text-uppercase collapsible-link py-2">{{ auth('web')->check() ? '#1' : '#2' }}
                                            Chọn
                                            dịch vụ</a></h6>
                                </div>

                                <div id="serviceContent" aria-labelledby="serviceHeading" data-parent="#booking"
                                    class="collapse">
                                    <!-- list dịch vụ -->
                                    <div class="d-flex flex-wrap px-2 justify-content-between">
                                        @foreach ($serviceCategories as $category)
                                            @if (!$category->services->isEmpty())
                                                <div class="row mt-4">

                                                    <div class="col-12 px-3">
                                                        <div>
                                                            <h5 class="h3">{{ $category->name }}</h5>
                                                        </div>
                                                        <div class="row px-2">
                                                            @foreach ($category->services as $service)
                                                                <div class="col-md-3 col-6 mt-2 px-2">
                                                                    <div class="card">
                                                                        <div class="card-body p-0">
                                                                            <div class="card-img-actions">
                                                                                <img src="{{ asset($service->image) }}"
                                                                                    class="card-img img-fluid"
                                                                                    height="250" alt="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="card-body  text-center p-0 pt-2 ">
                                                                            <div class="">
                                                                                <h6 class="font-weight-semibold">
                                                                                    <span href="#"
                                                                                        class="text-default h4">{{ $service->name }}</span>
                                                                                </h6>
                                                                            </div>
                                                                            <span
                                                                                class="mb-0 font-weight-semibold d-block">{{ $service->price }}
                                                                                VND
                                                                            </span>

                                                                            <label class="check mt-1">
                                                                                <input type="checkbox"
                                                                                    id="service_{{ $service->id }}"
                                                                                    name="services[]"
                                                                                    value="{{ $service->id }}"
                                                                                    data-price="{{ $service->price }}">
                                                                                <span type="button"
                                                                                    class="btn ">Chọn</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- end service card -->
                            <!-- begin staff card -->
                            <div class="card">
                                <div id="staffHeading" class="card-header shadow-sm border-0">
                                    <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                            data-target="#staffContent" aria-expanded="false" aria-controls="staffContent"
                                            class="d-block position-relative text-white text-uppercase collapsible-link py-2">{{ auth('web')->check() ? '#2' : '#3' }}
                                            Chọn
                                            nhân viên và thời gian</a></h6>
                                </div>
                                <div id="staffContent" aria-labelledby="staffHeading" data-parent="#booking"
                                    class="collapse">
                                    <div class="position-relative p-3" style="background-color: #f6f6f6">
                                        <button class="position-absolute top-50 btn btn-white rounded-circle bg-white"
                                            id="scroll-left"><svg width="20" height="20" viewBox="0 0 20 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 10H5M5 10L10 15M5 10L10 5" stroke="black" stroke-width="2" />
                                            </svg></button>
                                        <button
                                            class="position-absolute top-50 right-0 btn btn-white rounded-circle bg-white"
                                            id="scroll-right"><svg width="20" height="20" viewBox="0 0 20 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 10H15M15 10L10 15M15 10L10 5" stroke="black"
                                                    stroke-width="2" />
                                            </svg></button>
                                        <div id="employee_list" class="scrollable" style="white-space: nowrap;">
                                            <h5 class="text-center mb-3">Chọn nhân viên</h5>
                                            @foreach ($staffMembers as $staff)
                                                <div class="d-inline-block">
                                                    <div class="p-0">
                                                        <input type="radio" name="admin_id"
                                                            id="admin_{{ $staff->id }}" value="{{ $staff->id }}"
                                                            hidden>
                                                        <label for="admin_{{ $staff->id }}"
                                                            class="d-flex flex-column">
                                                            <img src="{{ $staff->avatar }}" class="rounded-circle"
                                                                style="width: 100px;height: 100px" alt="">
                                                            <h6 class="text-center">{{ $staff->username }}</h6>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <h5 class="text-center my-3">Chọn ngày</h5>
                                    <div class="px-3">
                                        <div class="row">
                                            <div class="col-md-4 mx-auto">
                                                <select class="custom-select my-select" name="day">
                                                    @foreach ($availableDates as $date)
                                                        <option
                                                            value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                                            {{ \Carbon\Carbon::parse($date)->format('\N\g\à\y\ d/m/Y') }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h5 class="text-center mb-3">Chọn thời gian</h5>
                                    <div class="d-flex flex-wrap justify-content-center" id="timeSelect">
                                        @foreach ($timeSlots as $time)
                                            <label class="check mx-1">
                                                <input type="radio" id="time_{{ $time->id }}" name="time_id"
                                                    value="{{ $time->id }}">
                                                <span>{{ $time->time }}</span>
                                            </label>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                            <!-- end staff card -->

                        </div>
                    </div>
                </div>
                @php
                    if (auth('web')->check()) {
                        $user = auth('web')->user();
                    }
                @endphp
                <div id="info" class="mt-5">
                    <form method="post">
                        <h3>Thông tin liên hệ</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="infoUsername" class="form-control"
                                        placeholder="Tên của bạn *" required value="{{ $user->username ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="infoPhone" class="form-control"
                                        placeholder="Số điện thoại *" value="{{ $user->phone ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="infoEmail" class="form-control"
                                        placeholder="Email của bạn *" value="{{ $user->email ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Mã giảm giá</label>
                                    <textarea class="form-control" name="promoCode" id="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="">
                <div class="team-end-2  text-right">
                    <h4 class="h5">Tổng tiền dịch vụ: <span id="totalPrice">0</span>VND</h4>
                    <button id="bookingConfirm" class="theme-btn-2 font-weight-bold">Đặt lịch</button>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('js_footer_custom')
    <script>
        $('#scroll-left').click(function() {
            $('.scrollable').animate({
                scrollLeft: '-=300px'
            }, 300);
        });

        $('#scroll-right').click(function() {
            $('.scrollable').animate({
                scrollLeft: '+=300px'
            }, 300);
        });
        $(document).ready(function() {
            $('input:radio[name="admin_id"]').change(function() {
                performAjaxRequest();
            });
            $('#timeSelect').on('change', 'input:radio[name="time_id"]', function() {
                const admin = $('input:radio[name="admin_id"]:checked').val();
                if (!admin) {
                    toastr.error('Vui lòng chọn nhân viên');
                    $('input:radio[name="time_id"]').prop('checked', false);
                }
            });
            $('select[name="day"]').change(function() {
                performAjaxRequest();
            });
            // Lắng nghe sự kiện change
            $('input[name="services[]"]').on('change', function() {
                // get data-price
                // Lấy mảng các giá trị đã check
                var checked = $('input[name="services[]"]:checked').map(function() {
                    return $(this).data('price');
                }).get();
                var tottalPrice = checked.reduce(function(a, b) {
                    return a + b;
                });
                $('#totalPrice').text(tottalPrice.toLocaleString());

            });

            function renderTimes(times) {
                $('#timeSelect').empty();
                times.forEach(function(time) {
                    let checkAvailable = "";
                    if (time.pivot) {
                        checkAvailable = time.pivot.status === 'unavailable' ? 'disabled' : ''
                    }
                    const radioOption = `
                                <label class="check mx-1">
                                    <input type="radio" id="time_${time.id}" name="time_id"
                                        value="${time.id}" ${checkAvailable}>
                                    <span>${time.time}</span>
                                </label>
                    `;
                    // Thêm radio button vào giao diện
                    $('#timeSelect').append(radioOption);

                });
            }

            function performAjaxRequest() {
                const data = new FormData();
                const url = "{{ route('booking-service.getStaff') }}";
                const admin_id = $('input:radio[name="admin_id"]:checked').val();
                const day = $('select[name="day"]').val();
                if (admin_id && day) {
                    data.append('admin_id', admin_id);
                    data.append('day', day);
                } else if (day) {
                    data.append('day', day);
                }
                sendAjaxRequest(url, 'post', data,
                    function(response) {
                        console.log(response);
                        renderTimes(response.times);
                    },
                    function(error) {
                        console.log(error);
                        toastr.error(error.responseJSON.message);
                    }
                );
            }
            $('#phoneOtpInput').on("input", function(e) {
                const phone = $('input[name="infoPhone"]');
                //set phone value = phoneOtpInput
                phone.val($('#phoneOtpInput').val());

            })
            $('#bookingConfirm').click(function() {
                // phoneOtpNumberInput
                var otpInput = $('#phoneOtpInput').length == 0 ? false : true;
                var verifyInput = $('input[name="verification"]').length == 0 ? false : true;
                if (!otpInput && !verifyInput) {
                    const form = new FormData();
                    const selectedServices = $('input[name="services[]"]:checked');
                    let totalPrice = $('#totalPrice').text();

                    const name = $('input[name="infoUsername"]').val() ?? "";
                    const adminId = $('input:radio[name="admin_id"]:checked').val() ?? "";
                    const phone = $('input[name="infoPhone"]').val() ?? "";
                    const promoCode = $('textarea[name="promoCode"]').val();
                    totalPrice = totalPrice.replace(/,/g, '');
                    const email = $('input[name="infoEmail"]').val() ?? "";
                    const day = $('select[name="day"]').val() ?? "";
                    const time = $('input[name="time_id"]:checked').val() ?? "";
                    const servicesId = selectedServices.map(function() {
                        return $(this).val();
                    }).get();
                    form.append('name', name);
                    form.append('admin_id', adminId);
                    form.append('phone', phone);
                    promoCode ? form.append('promo_code', promoCode) : "";
                    form.append('total_price', totalPrice);
                    form.append('email', email);
                    form.append('day', day);
                    form.append('time', time);
                    form.append('servicesId', servicesId);

                    sendAjaxRequest("{{ route('booking-service.store') }}", 'post', form,
                        response => {
                            toastr.success(response.message);
                            location.href = "{{ route('home.index') }}";
                        },
                        error => {
                            console.log(error);
                            const errors = error.responseJSON.errors;
                            Object.keys(errors).forEach(key => {
                                errors[key].forEach(errorMessage => {
                                    toastr.error(errorMessage);
                                });
                            });
                        }
                    );
                } else {
                    toastr.error('Vui lòng xác thực số điện thoại');
                }

            })
        })
    </script>
@endsection
