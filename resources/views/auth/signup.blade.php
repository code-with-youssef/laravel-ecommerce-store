@extends('Layouts.master')

@section('content')

<div class="d-flex justify-content-center" style="margin-top: 80px; margin-bottom: 200px;">
    <div class="col-lg-5"> 
        <div class="form-title text-center mb-4">
            <h2>انشاء حساب</h2>
        </div>
        <div id="form_status"></div>
        <div class="contact-form">
            <form action="{{ route('register') }}" method="POST" id="fruitkha-contact" onsubmit="return valid_datas(this);">
                @csrf

                <div class="form-group mb-3">
                    <input type="text" class="form-control allow-select custom-input" placeholder="الاسم" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <input type="email" class="form-control allow-select custom-input" placeholder="البريد الالكتروني" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control allow-select custom-input" placeholder="كلمة المرور" name="password" id="password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <input type="password" class="form-control allow-select custom-input" placeholder="تأكيد كلمة المرور" name="password_confirmation" id="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <p>لديك حساب بالفعل؟ <a href="{{route('login.index')}}" style="color:#3180a5">تسجيل دخول</a></p>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary px-4" value="انشاء حساب">
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-input {
        height: 50px; 
        font-size: 16px;
    }

    .col-lg-5 {
        max-width: 500px; 
    }

    .text-danger {
        font-size: 12px;
        margin-top: 5px;
    }
</style>

@endsection
