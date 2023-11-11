@extends('admin.templates.login')
@section('title', 'Login')
@section('content')
    <div
        class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
            Yêu cầu đặt lại mật khẩu
        </h2>
        <form action="{{ url('admin/forget-password') }}" method="post">
            @csrf
            <div class="intro-x mt-8">
                <input type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Nhập email"
                    value="{{ old('email') }}" name="email">
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Gửi yêu cầu</button>
            </div>
        </form>
    </div>
@endsection
