@extends('admin.templates.app')
@section('title', 'Thêm lịch đặt')
@section('css_header_custom')
    @include('admin.ScheduleManagement.css-scheduleMagement')
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
                        <label for="crud-form-1" class="form-label">Họ và tên <span style="color: red">*</span></label>
                        <input id="name" name="name" type="text" class="form-control w-full"
                            placeholder="Họ và tên">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Số điện thoại <span style="color: red">*</span></label>
                        <input id="phone" name="phone" type="text" class="form-control w-full"
                            placeholder="Số điện thoại">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Email <span style="color: red">*</span></label>
                        <input id="email" name="email" type="text" class="form-control w-full" placeholder="Email">
                    </div>
                    <div id="faq-accordion-2" class="accordion mt-3">
                        <div class="accordion-item">
                            <div id="faq-accordion-content-2" class="accordion-header flex form-control py-2 px-1">
                                <i data-lucide="list" class="block mr-2"></i>
                                <button class="accordion-button collapsed" type="button"
                                    data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-2"
                                    aria-expanded="false" aria-controls="faq-accordion-collapse-2"
                                    style="font-size: 16px; color: #1E293B">
                                    Danh sách dịch vụ <span style="color: red">*</span>
                                </button>
                            </div>
                            <div id="faq-accordion-collapse-2" class="accordion-collapse collapse"
                                aria-labelledby="faq-accordion-content-2" data-tw-parent="#faq-accordion-1">
                                <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                    <div class="grid grid-cols-12 mt-5">
                                        @foreach ($serviceCategories as $category)
                                            <div class="intro-y col-span-12 md:col-span-12 lg:col-span-12">
                                                <div id="faq-accordion-1" class="accordion accordion-boxed p-5 ">
                                                    <div class="accordion-item ">
                                                        <div id="faq-accordion-content-1" class="accordion-header w-full ">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-tw-toggle="collapse"
                                                                data-tw-target="#faq-accordion-collapse-1"
                                                                aria-expanded="false"
                                                                aria-controls="faq-accordion-collapse-1">
                                                                <h2 class="font-medium text-xl" style="color: #312E81">
                                                                    {{ $category->name }}</h2>
                                                            </button>
                                                        </div>

                                                        <div id="faq-category-{{ $category->id }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="faq-category-{{ $category->id }}"
                                                            data-tw-parent="#faq-accordion-1">
                                                            <div
                                                                class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                                                <div class="grid grid-cols-12 gap-6 mt-5">
                                                                    @foreach ($category->services as $service)
                                                                        <div class="intro-y col-span-12 md:col-span-6">
                                                                            <div class="">
                                                                                <div
                                                                                    class="flex flex-col lg:flex-row items-center p-5">
                                                                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1"
                                                                                        style="width: 100px;height: 100px;">
                                                                                        <img alt="ảnh"
                                                                                            class="rounded-full"
                                                                                            src="{{ asset($service->image) }}">
                                                                                    </div>
                                                                                    <div
                                                                                        class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                                                                        <div
                                                                                            class="font-medium text-lg" style="color: #1E293B">{{ $service->name }}</div>
                                                                                        <div
                                                                                            class="text-slate-500 text-lg mt-0.5" style="color: #1E293B">
                                                                                            Giá: {{ number_format($service->price) }}
                                                                                            VND</div>
                                                                                    </div>
                                                                                    <div class="flex mt-4 lg:mt-0">

                                                                                        @if ($category->can_choose == 'one')
                                                                                <label class="check mt-1">
                                                                                    <input type="checkbox"
                                                                                        id="service_{{ $service->id }}"
                                                                                        name="{{ $category->id }}services[]"
                                                                                        value="{{ $service->id }}"
                                                                                        data-price="{{ $service->price }}">
                                                                                    <span type="button"
                                                                                        class="btn ">Chọn</span>
                                                                                </label>
                                                                            @else
                                                                                <label class="check mt-1">
                                                                                    <input type="checkbox"
                                                                                        id="service_{{ $service->id }}"
                                                                                        name="{{ $category->id }}services[]"
                                                                                        value="{{ $service->id }}"
                                                                                        data-price="{{ $service->price }}">
                                                                                    <span type="button"
                                                                                        class="btn ">Chọn</span>
                                                                                </label>
                                                                            @endif
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="faq-accordion-1" class="accordion mt-3">
                        <div class="accordion-item">
                            <div id="faq-accordion-content-2" class="accordion-header flex form-control py-2 px-1">
                                <i data-lucide="list" class="block mr-2"></i>
                                <button class="accordion-button collapsed" type="button"
                                    data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-2"
                                    aria-expanded="false" aria-controls="faq-accordion-collapse-2"
                                    style="font-size:16px; color: #1E293B">Danh sách nhân viên <span style="color: red">*</span></button>
                            </div>
                            <div id="faq-accordion-collapse-2" class="accordion-collapse collapse"
                                aria-labelledby="faq-accordion-content-2" data-tw-parent="#faq-accordion-1">
                                <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                    <div id="multiple-item-slider" class="p-5">
                                        <div class="preview">
                                            <div class="mx-6">
                                                <div class="multiple-items">
                                                    <div>
                                                        <label class="radio-button-with-image text-center mx-2">
                                                            <input type="radio" name="admin_id" id="admin_"
                                                                value="random" checked hidden>
                                                            <div class="image-container">
                                                                <img src="{{ asset('dist/images/default.jpg') }}">
                                                            </div>
                                                            <h3 class="text-center text-white font-medium text-lg">
                                                                Chọn Hộ</h3>
                                                        </label>
                                                    </div>
                                                    @foreach ($staffMembers as $staff)
                                                        <div>
                                                            <label class="radio-button-with-image text-center mx-2">
                                                                <input type="radio" name="admin_id"
                                                                    id="admin_{{ $staff->id }}"
                                                                    value="{{ $staff->id }}" hidden>
                                                                <div class="image-container">
                                                                    <img src="{{ asset($staff->avatar) }}"
                                                                        alt="{{ $staff->username }}">
                                                                </div>
                                                                <h3 class="text-center text-white font-medium text-lg">
                                                                    {{ $staff->username }}</h3>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="mt-5 flex flex-col items-center justify-content-center">
                                                    <label for="crud-form-1"
                                                        class="form-label text-lg mb-2 font-medium text-white">Ngày đặt
                                                        lịch</label>
                                                    <div class="px-3">
                                                        <div class="row">
                                                            <div class="col-md-4 mx-auto">
                                                                <select class="form-control" style="font-size: 18px"
                                                                    name="day">
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
                                                </div>
                                                <div class="mt-3 flex flex-col items-center">
                                                    <h5 class="text-center text-lg mb-3 font-medium text-white">Chọn thời
                                                        gian</h5>
                                                    <div class="d-flex flex-wrap justify-content-center" id="timeSelect">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Mã giảm giá </label>
                        <input name="promoCode" type="text" id="promotion" class="form-control w-full" placeholder="Mã giảm giá">
                    </div>
                    <div class="mt-5">
                        <h3 class="font-medium text-base">Tổng tiền dịch vụ: <span id="totalPrice">
                                {{ number_format(0) }}
                            </span> VND</h3>
                    </div>
                </div>

            </form>
            <div class="mt-3">
                <div class="text-left mt-3">
                    <a href="{{ route('admin.scheduleManagement.index') }}"> <button type="button"
                            class="btn btn-outline-secondary w-24 mr-1">Danh
                            sách </button></a>
                    <button type="button" id="bookingConfirm" class="btn btn-primary w-24">Lưu</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
    @include('admin.ScheduleManagement.store-scheduleManagement')
@endsection
