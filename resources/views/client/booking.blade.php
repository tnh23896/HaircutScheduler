@extends('client.templates.app')
@section('title', 'Chi tiết bài viết')
@section('css_header_custom')
    <style>
        .top-50 {
            top: 50%;
            transform: translateY(-100%);
        }

        .right-0 {
            right: 0;
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
            transition: box-shadow 0.3s ease-in-out;
        }

        input[type="radio"]:checked+label {
            box-shadow: 0 0 10px #d49f35,
                0 0 20px 10px #d49f35;
        }
    </style>
@endsection
@section('content')
    <section class="my-5 p-0 barber-con gap no-bottom">
        <div class="heading-style text-center">
            <h2>Đặt lịch cắt tóc</h2>
            <div class="scissor-border position-relative">
                <span class="mt-0"><svg fill="#332b23" height="20" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
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
            <h2 class="text-center text-color">Tay nghề số một</h2>
            <h3 class="pb-1 text-center">{{ now()->format("\T\h\á\\n\g m \\n\ă\m Y") }}</h3>
            <form>
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 text-center">
                            <label for="date" class="h3 ">Chọn ngày hẹn cắt tóc:</label>
                            <input class="form-control form-control-lg" type="date" id="date">
                        </div>
                    </div>
                </div>
            </form>
            <!-- list dịch vụ -->
            <h3 class="s2 text-center mt-3">Chọn dịch vụ</h3>

            <div class="row">
                @foreach ($categoriesServices as $category)
                    @if (!$category->services->isEmpty())
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="sc-group">
                                <h5 class="h3">{{ $category->name }}</h5>
                                @foreach ($category->services as $service)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                            id="service_{{ $service->id }}">
                                        <label class="custom-control-label"
                                            for="service_{{ $service->id }}">{{ $service->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>



            <h1 class="text-center">Danh sách nhân viên cắt tóc</h1>
            <div class="position-relative">
                <button class="position-absolute top-50 btn btn-white rounded-circle bg-white" id="scroll-left"><svg
                        width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 10H5M5 10L10 15M5 10L10 5" stroke="black" stroke-width="2" />
                    </svg></button>
                <button class="position-absolute top-50 right-0 btn btn-white rounded-circle bg-white"
                    id="scroll-right"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 10H15M15 10L10 15M15 10L10 5" stroke="black" stroke-width="2" />
                    </svg></button>
                <div id="employee_list" class="scrollable" style="white-space: nowrap;">
                    @foreach ($staffs as $staff)
                        <div class="d-inline-block" style="max-width: 200px;min-width: 150px">
                            <div class="p-0">
                                <input type="radio" name="admin_id" id="admin_{{ $staff->id }}"
                                    value="{{ $staff->id }}" hidden>
                                <label for="admin_{{ $staff->id }}" class="d-flex flex-column">
                                    <img src="{{ $staff->avatar }}" class="img-fluid" alt="">
                                    <h5 class="card-title text-center">{{ $staff->username }}</h5>
                                </label>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>



            <h2 class="text-center mb-3">Chọn thời gian</h2>
            <div class="d-flex flex-wrap justify-content-center team-inner">
                <ul class="list-unstyled d-flex flex-wrap m-3" id="timeSelect">
                    @foreach ($times as $time)
                        <li><button class="time-button" data-time="{{ $time->id }}">{{ $time->time }}</button></li>
                    @endforeach
                </ul>
            </div>




            <div class="col-md-11 col-sm-12">
                <div class="team-end-2  text-right">
                    <h4>£ 16.00</h4>
                    <p>09:00 am - 09:45 am</p>
                    <button class="theme-btn-2">CONFIRM</button>
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
            console.log("test");
            $('.scrollable').animate({
                scrollLeft: '+=300px'
            }, 300);
        });
        $(document).ready(function() {
            $('input:radio[name="admin_id"]').change(function() {
                performAjaxRequest();
            });
            $('#date').change(function() {
                performAjaxRequest();
            });


            function performAjaxRequest() {
                var selectedValue = $('input:radio[name="admin_id"]:checked').val();
                var selectedDate = $("#date").val();


                if (selectedValue && selectedDate) {
                    const url = "{{ route('booking-service.getStaff') }}";
                    const data = new FormData();
                    data.append('admin_id', selectedValue);
                    data.append('day', selectedDate);


                    sendAjaxRequest(url, 'post', data,
                        function(response) {
                            console.log(response);
                            $('#timeSelect').empty();
                            response.times.forEach(function(time) {
                                var radioOption = `
                                    <li><button class="time-button" data-time="${time.id}" ${time.pivot.status === 'unavailable' ? 'disabled' : ''}>${time.time}</button></li>
                                `;


                                // Thêm radio button vào giao diện
                                $('#timeSelect').append(radioOption);
                                $(".time-button").click(function() {

                                    // Loại bỏ lựa chọn trước đó
                                    $(".time-button").css("backgroundColor", "");

                                    // Đánh dấu nút đã chọn
                                    $(this).css("backgroundColor", "#d98430");

                                    // Lưu thời gian đã chọn
                                    var time = $(this).attr("data-time");
                                    console.log("Đã chọn thời gian: " + time);

                                });
                            });
                        },
                        function(error) {
                            console.log(error);
                        }
                    );
                }
            }




            $('form').on('submit', function(e) {
                e.preventDefault();
                const form = new FormData(this);
                const url = "{{ route('booking-service.store') }}";
                sendAjaxRequest(url, 'post', form,
                    function(response) {
                        console.log(response);
                    },
                    function(error) {
                        console.log(error);
                    }
                );
            })
        })
    </script>
@endsection
