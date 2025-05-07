@extends('Layouts.master')

@section('content')
    {{-- Hero section or store features section --}}
    <div class="feature-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="featured-text">
                        <h2 class="pb-3">JO <span class="orange-text">Store</span></h2>
                        
                        {{-- Features list --}}
                        <div class="row">
                            {{-- Fast Delivery --}}
                            <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="content">
                                        <h3>التوصيل السريع</h3>
                                        <p>اسرع خدمة توصيل خلال 48 ساعة لكل المحافظات.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Best Prices --}}
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h3>احسن الاسعار</h3>
                                        <p>أفضل سعر لكل المنتجات</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Packaging --}}
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="content">
                                        <h3>التغليف</h3>
                                        <p>تغليف متميز وعصري </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Return Policy --}}
                            <div class="col-lg-6 col-md-6">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-sync-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h3>خدمات الاسترجاع</h3>
                                        <p>يمكنك استرجاع اي منتج خلال اسبوع من الشراء</p>
                                    </div>
                                </div>
                            </div>
                        </div> {{-- End of features list --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
