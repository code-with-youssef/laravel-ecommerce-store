@extends('layouts.admin')

@section('title', 'products')

@section('breadcrumb')


@section('content')
    
    <div class="card mb-4">
        <form class="d-flex align-items-center mb-4" action="{{route('searchProducts')}}" method="GET" autocomplete="off" dir="rtl">
            <div class="input-group">
                <input type="search" 
                    name="query" 
                    placeholder="البحث" 
                    class="form-control border-end-0"
                    aria-label="Search products">
                <input type="hidden" name="category" value="{{$category->id}}">
                <button type="submit" class="btn btn-outline-secondary border-end-0 bg-white">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
        </form>



        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0"> قائمة المنتجات قسم ({{$category->name}})</h3>
            <a href="{{route('createProduct',$category)}}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-2"></i>اضافة منتج للقسم
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>الاسم</th>
                            <th>السعر</th>
                            <th>الوصف</th>
                            <th>الكمية</th>
                            <th>تاريخ الانشاء</th>
                            <th>التعديلات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{url($product->imagepath)}}" style="max-width: 150px; max-height:150px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <span class="badge bg-" style="color: black">
                                      {{$product->quantity}}
                                    </span>
                                </td>
                                <td>{{ $product->created_at->format('d M Y') }}</td>
                                <td class="action-btns">
                                    <a href="{{route('adminProducts.edit',$product)}}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> تعديل
                                    </a>
                                    <form action="{{route('adminProducts.destroy',$product)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> مسح 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No products found
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection