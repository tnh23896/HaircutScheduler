@extends('admin.templates.login')
@section('title', 'Đăng nhập')
@section('content')
    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
            Đăng nhập vào trang quản trị
        </h2>
        <form action="{{ route('admin.auth.login') }}" method="post">
            @csrf
            <div class="intro-x mt-8">
                <input type="text" class="intro-x login__input form-control py-3 px-4 block " placeholder="Email"
                    value="{{ old('email') }}" name="email">
                <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Mật khẩu"
                    name="password">
            </div>
            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                <div class="flex items-center mr-auto">
                    <input id="remember" type="checkbox" name="remember" class="form-check-input border mr-2">
                    <label class="cursor-pointer select-none" for="remember-me">Lưu thông tin đăng nhập</label>
                </div>
                <a href="{{ route('admin.auth.ForgetPassword') }}">Quên mật khẩu?</a>
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
@endsection

