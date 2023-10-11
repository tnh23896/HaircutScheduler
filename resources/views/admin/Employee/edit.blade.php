@extends('admin.templates.app')
@section ('title','Đăng ký nhân viên')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Đăng ký nhân viên mới
        </h2>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="crud-form" action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <div>
                    <label for="crud-form-1" class="form-label">Tên nhân viên</label>
                    <input id="crud-form-1" name="username" value="{{ $employee->username }}" type="text" class="form-control w-full" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <img src="{{ asset($employee->avatar) }}" width="100" alt="">
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Ảnh đại diện</label>
                    <input id="crud-form-2" name="avatar" type="file" class="form-control" accept=".jpg, .jpeg, .png, .gif">
                </div>
                <div class="mt-3">
                    <label for="crud-form-5" class="form-label">Số điện thoại</label>
                    <input id="crud-form-5" name="phone" value="{{ $employee->phone }}" type="tel" class="form-control" placeholder="Số điện thoại">
                </div>

                <div class="mt-3">
                    <label for="crud-form-6" class="form-label">Email</label>
                    <input id="crud-form-6" name="email" value="{{ $employee->email }}" type="email" class="form-control" placeholder="Email">
                </div>
                
                <div class="mt-3">
                    <label for="crud-form-7" class="form-label">Mật khẩu</label>
                    <input id="crud-form-7" name="password" value="{{ $employee->password }}" type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                
                <div class="mt-3">
                    <label for="crud-form-8" class="form-label">Mô tả</label>
                    <textarea id="crud-form-8" name="description" class="form-control" placeholder="Mô tả">{{ $employee->description }}</textarea>
                </div>
                
                <div class="text-right mt-5">
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-outline-secondary w-24 mr-1">Huỷ bỏ</a>
                    <button  class="btn btn-primary w-24">Lưu</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
