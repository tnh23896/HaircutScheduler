@extends('admin.templates.app')
@section ('title','Chọn lịch làm việc')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chọn lịch làm việc của nhân viên
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="crud-form" action="{{ route('admin.work-schedule.store') }}" method="POST"
                  enctype="multipart/form-data" class="intro-y box p-5">
                @csrf
                <input type="hidden" name="admin_id" value="{{ $employee->id }}">
                <li class="inline-block mb-5 relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                    <input type="date" class="text-white form-control form-control-lg" name="day" >
                </li>
                <ul class="text-sm text-gray-600">
                    @foreach($times as $time)
                        <li class=" mr-6 p-4 border-info inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                            <input type="checkbox" class="form-check-input w-6 h-6" name="times[]" value="{{ $time->id }}">
                            <span class="">{{ $time->time }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="text-left mt-5">
                    <a href="{{ route('admin.work-schedule.index', ['id' => $employee->id]) }}" class="btn btn-outline-secondary w-24 mr-1">Huỷ bỏ</a>
                    <button class="btn btn-primary w-24">Lưu</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
