@extends('Layouts.master')

@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">

                {{-- The image of the product --}}
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ url($product->imagepath) }}" alt="">
                    </div>
                </div>


                <div class="col-md-7">
                    {{-- Message of success --}}
                    @if (session('success'))
                        <div class="alert alert-success animate-fade" id="myAlert">
                            {{ session('success') }} <a href="{{ route('cart.index', $currentUser) }}"><i
                                    class="fas fa-shopping-cart"></i>الذهاب للعربة</a>
                            <button onclick="document.getElementById('myAlert').style.display='none'"
                                style="background:none; border:none; float:right; font-size:20px;">&times;</button>
                        </div>
                    @endif

                    {{-- Message of failure --}}

                    @if (session('failed'))
                        <div class="alert alert-info animate-fade" id="myAlert">
                            {{ session('failed') }}
                            <button onclick="document.getElementById('myAlert').style.display='none'"
                                style="background:none; border:none; float:right; font-size:20px;">&times;</button>
                        </div>
                    @endif

                    {{-- Product details --}}

                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"> {{ $product->price }} LE </p>
                        <p>{{ $product->description }}</p>
                        {{-- Adding to cart form --}}
                        <div class="single-product-form">
                            {{-- Checking if the user is logged in by searching for their token in the session --}}
                            @if (Auth::check())
                                <form action="{{ route('cart_item.store') }}" method="POST">
                                    @csrf
                                    @if ($currentUser->cart)
                                        <input type="hidden" name="cart_id" value="{{ $currentUser->cart->id }}">
                                    @endif
                                    <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" id="quantity" max="{{ $product->quantity }}"
                                        min="0" value="{{ $product->quantity > 0 ? 1 : 0 }}">
                                    <input type="hidden" name="product_quantity" id="quantity"
                                        value="{{ $product->quantity }}">


                                    <p>{{ $product->quantity }} باقي في المخزن</p>
                                    <strong>التصنيف: <a
                                            href="{{ route('products.index', $product->category) }}">{{ $product->category->name }}</a></strong>

                                    {{-- checking the availability of the product --}}
                                    @if ($product->quantity >= 1)
                                        <input type="submit" value="أضف الى عربة الشراء">
                                    @else
                                        <p style="color: #051922; font-size: 20px;">هذا المنتج سيتوفر قريبا</p>
                                        <input type="submit" value="أضف الي عربة الشراء" disabled>
                                    @endif
                                </form>





                                {{-- End of the adding to cart form --}}
                                {{-- ------------------------------------------------------------------------------------------------------------------------ --}}
                                {{-- ------------------------------------------------------------------------------------------------------------------------ --}}
                                {{-- Review form --}}
                                <div class="review-container">
                                    <form action="{{ route('review.store') }}" method="POST" id="reviewForm">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        {{-- Stars section --}}
                                        <div class="form-group rating-container">
                                            <div class="star-rating">
                                                <input type="radio" id="5-stars" name="rating" value="5" />
                                                <label for="5-stars" class="star">&#9733;</label>
                                                <input type="radio" id="4-stars" name="rating" value="4" />
                                                <label for="4-stars" class="star">&#9733;</label>
                                                <input type="radio" id="3-stars" name="rating" value="3" />
                                                <label for="3-stars" class="star">&#9733;</label>
                                                <input type="radio" id="2-stars" name="rating" value="2" />
                                                <label for="2-stars" class="star">&#9733;</label>
                                                <input type="radio" id="1-star" name="rating" value="1" />
                                                <label for="1-star" class="star">&#9733;</label>
                                            </div>
                                            <span class="rating-label">:التقييم</span>
                                        </div>
                                        {{-- Comment section --}}
                                        <div id="hiddenContent" class="hidden-content">
                                            <div class="form-group">
                                                <textarea name="comment" id="comment" placeholder="اكتب تعليقك هنا..." required class="allow-select"></textarea>
                                            </div>

                                            <input type="submit" value="إرسال التقييم">
                                        </div>
                                    </form>
                                </div>
                                {{-- End of the review form --}}
                                {{-- ------------------------------------------------------------------------------------------------------------------------ --}}
                                {{-- ------------------------------------------------------------------------------------------------------------------------ --}}

                                {{-- Forwarding to the login page if the user is not logged in --}}
                            @else
                                <p style="color: #051922; font-size: 20px;">لإتمام عملية الشراء يجب تسجيل الدخول</p>
                                <a href="{{ route('login.index') }}" class="boxed-btn"
                                    style="color:black; font-size:15px; font-weight:bold">سجل الان</a>
                            @endif
                        </div>

                        {{-- Sharing section --}}
                        <h4>:مشاركة المنتجات</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <h3>مراجعات العنصر</h3>
                    @if ($product->reviews->isEmpty())
                        <h6>لا توجد مراجعات</h6>


                    @elseif($product->reviews->count() === 1)
                        @foreach ($product->reviews as $review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="{{ url($review->user->imagepath) }}" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $review->user->name }}</h3>
                                    @for ($i = 0; $i < $review->stars; $i++)
                                        <label for="5-stars" class="star">&#9733;</label>
                                    @endfor
                                    <p class="testimonial-body">
                                        {{ "$review->comment" }}
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="testimonial-sliders owl-carousel">
                        <!-- Foreach loop will go here -->
                        @foreach ($product->reviews as $review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="{{ url($review->user->imagepath) }}" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $review->user->name }}</h3>
                                    @for ($i = 0; $i < $review->stars; $i++)
                                        <label for="5-stars" class="star">&#9733;</label>
                                    @endfor
                                    <p class="testimonial-body">
                                        {{ "$review->comment" }}
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        const hiddenContent = document.getElementById('hiddenContent');

        ratingInputs.forEach(input => {
            input.addEventListener('click', function() {
                hiddenContent.style.display = 'block';
            });
        });
    });
</script>
