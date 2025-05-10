@extends('Layouts.Admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow">
                <div class="card-body py-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-search fa-4x text-muted mb-3"></i>
                        <h3 class="h4 text-gray-800 mb-3">لا توجد نتائج تطابق عملية البحث</h3>
                        <p class="text-muted">لم نتمكن من العثور على ما تبحث عنه. حاول استخدام مصطلحات بحث أخرى.</p>
                    </div>
                    <a href="#" onclick="history.go(-1); return false;" class="btn btn-primary">
                        <i class="fas fa-chevron-right mr-2"></i> العودة للصفحة السابقة
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection