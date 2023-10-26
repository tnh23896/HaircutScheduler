@extends('admin.templates.app')
@section('title', 'Thông tin cá nhân')
@section('content')
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profile Layout
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-5.jpg">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{$data->username}}</div>
                        <div class="text-slate-500">{{$roleName}}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center mt-5" href="{{route('admin.profile.edit')}}"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Thông tin cá nhân </a>
                    <a class="flex items-center mt-5" href="#"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Thay đổi mật khẩu </a>
                    <a class="flex items-center mt-5" href="{{route('admin.ScheduleEmployee.index')}}"> <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> Xem lịch làm việc </a>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center" href="{{route('admin.auth.logout')}}"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Đăng xuất </a>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            asdasdd
        </div>
    </div>
</div>
@endsection
