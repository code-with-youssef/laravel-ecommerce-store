@extends('Layouts.master')

@section('content')

<div class="full-height-section error-section">
    <div class="full-height-tablecell">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="error-text">
                        <i class="far fa-smile-beam"></i>
                        <h1>تم إتمام الطلب بنجاح، شكراً لاستخدامك متجرنا</h1>
                        <a href="{{route('home.index')}}" class="boxed-btn">العودة للصفحة الرئيسية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection