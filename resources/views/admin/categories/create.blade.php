@extends('Layouts.Admin')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3>اضافة قسم القسم</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('adminCategories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">اسم القسم<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="name" name="name"
                       placeholder="name" required>
                </div>


                <label for="name" class="form-label">صورة القسم<span class="text-danger">*</span></label>
                <div class="mb-2">
                    <img id="currentImage"style="max-width: 150px; max-height:150px;">
                    <input type="file" name="image" id="fileInput">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('adminCategories.index') }}" class="btn btn-secondary me-2">الغاء</a>
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
