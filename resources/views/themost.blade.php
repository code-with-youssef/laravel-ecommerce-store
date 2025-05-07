@extends('Layouts.master')

@section('content')

<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <!--  Most sold section  -->
        <div class="row mb-100">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>الأكثر <span class="orange-text">مبيعاً</span></h2>
                    <p>منتجاتنا الأكثر طلباً من قبل العملاء</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="testimonial-sliders owl-carousel">
                    @foreach($soldProducts as $soldProduct)
                    <div class="single-testimonial-slider">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{url($soldProduct->imagepath)}}" alt="{{$soldProduct->name}}">
                            </div>
                            <div class="product-info">
                                <h3>{{$soldProduct->name}}</h3>
                                <a href="{{route("singleProduct.index",$soldProduct->id)}}" class="boxed-btn">
                                   شراء المنتج 
                                </a>
                                <div class="product-meta">
                                    <span class="price">{{$soldProduct->price}} LE</span>
                                    <span class="sales-count"><i class="fas fa-chart-line"></i> تم بيع {{$soldProduct->sales_count}} وحدة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Most searched section -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>الأكثر <span class="orange-text">بحثاً</span></h2>
                    <p>منتجاتنا الأكثر بحثاً من قبل الزوار</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="testimonial-sliders owl-carousel">
                    @foreach($popularProducts as $popularProduct)
                    <div class="single-testimonial-slider">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{url($popularProduct->imagepath)}}" alt="{{$popularProduct->name}}">
                            </div>
                            <div class="product-info">
                                <h3>{{$popularProduct->name}}</h3>
                                <a href="{{route("singleProduct.index",$popularProduct->id)}}"  class="boxed-btn">
                                    شراء المنتج 
                                 </a>
                                <div class="product-meta">
                                    <span class="price">{{$popularProduct->price}} LE</span>
                                    <span class="search-count"><i class="fas fa-search"></i> {{$popularProduct->search_count}}  عملية بحث</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .section-title {
        margin-bottom: 50px;
    }
    .section-title h2 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .section-title p {
        color: #777;
        font-size: 16px;
    }
    .product-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin: 15px;
    }
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .product-image {
        height: 250px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f9f9f9;
    }
    .product-image img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }
    .product-info {
        padding: 20px;
        text-align: center;
    }
    .product-info h3 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #333;
    }
    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .price {
        color: #f28123;
        font-weight: 700;
        font-size: 18px;
    }
    .sales-count, .search-count {
        font-size: 14px;
        color: #666;
    }
    .sales-count i, .search-count i {
        margin-left: 5px;
    }
    .mb-100 {
        margin-bottom: 100px;
    }
</style>