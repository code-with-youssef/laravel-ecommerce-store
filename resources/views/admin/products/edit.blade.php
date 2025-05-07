@extends('Layouts.Admin')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3>({{ $product->name }}) تعديل المنتج</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('adminProducts.update', $product) }}" method="POST" enctype="multipart/form-data"
                id="fileForm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="category" class="form-label">التصنيف <span class="text-danger">*</span></label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="{{$product->category->id }}">{{ $product->category->name }}</option>
                        @foreach($categories as $category)
                            @if($category->name != $product->category->name)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>



                <div class="mb-3">
                    <label for="name" class="form-label">الاسم <span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="name" name="name"
                        value="{{ old('name', $product->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">الوصف<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="description" name="description"
                    value="{{ old('name', $product->name ?? '') }}"   required>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">سعر المنتج<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="price" name="price"
                    value="{{ old('price', $product->price ?? '') }}"  required>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">الكمية<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="quantity" name="quantity"
                    value="{{ old('quantity', $product->quantity ?? '') }}"  required>
                </div>

                <label for="name" class="form-label">تعديل الصورة<span class="text-danger">*</span></label>
                <div class="mb-2">
                    <img src="{{ url($product->imagepath) }}" id="currentImage"
                        style="max-width: 150px; max-height:150px;">
                    <input type="file" name="image" id="fileInput">
                </div>


                <div class="d-flex justify-content-end">
                    <a href="{{ route('adminProductsIndex',$product->category) }}" class="btn btn-secondary me-2">الغاء</a>
                    <button type="submit" class="btn btn-primary">
                        تحديث
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
