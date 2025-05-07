@extends('Layouts.Admin')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3>  اضافة منتج للقسم ({{$category->name}})</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('adminProducts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type='hidden' id='category_id' name='category_id' value="{{$category->id}}">


                <div class="mb-3">
                    <label for="name" class="form-label">اسم المنتج<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="name" name="name"
                       placeholder="الاسم" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">الوصف<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="description" name="description"
                       placeholder="الوصف" required>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">سعر المنتج<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="price" name="price"
                       placeholder="السعر" required>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">الكمية<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="quantity" name="quantity"
                       placeholder="الكمية" required>
                </div>


                <label for="name" class="form-label">صورة القسم<span class="text-danger">*</span></label>
                <div class="mb-2">
                    <img id="currentImage"style="max-width: 150px; max-height:150px;">
                    <input type="file" name="image" id="fileInput">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-secondary me-2">الغاء</a>
                    <button type="submit" class="btn btn-primary">
                        اضافة
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; 
            if (file) {
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('currentImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
