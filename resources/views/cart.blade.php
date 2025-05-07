@extends('Layouts.master')

@section('content')

{{-- Check if cart is empty --}}
@if($userCart->cartItems->count() == 0)
    <div style="text-align: center; padding: 60px 20px;">
        <img src="{{ asset('assets/img/cart.png') }}" alt="Empty Cart" style="max-width: 350px; opacity: 0.7;">
        <h2 style="margin-top: 20px; color: #000000;">عربة التسوق فارغة</h2>
        <a href="{{ route('products.index') }}" class="boxed-btn">تسوق الان</a>
    </div>
@else
    {{-- Cart section --}}
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                {{-- Cart items table --}}
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-minus"></th>
                                    <th class="product-remove"></th>
                                    <th class="product-image">صورة العنصر</th>
                                    <th class="product-name">اسم العنصر</th>
                                    <th class="product-price">السعر</th>
                                    <th class="product-total">الكمية</th>
                                </tr>
                            </thead>
                            {{-- Loop through each cart item --}}
                            @foreach ($userCart->cartItems as $cartItem)
                                <tbody>
                                    <tr class="table-body-row">
                                        {{-- Decrease quantity --}}
                                        <td class="product-minus">
                                            <form action="{{ route('cart_item.update', $cartItem->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-light">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </form>
                                        </td>
                                        {{-- Remove item --}}
                                        <td class="product-remove">
                                            <form action="{{ route('cart_item.destroy', $cartItem->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        {{-- Product image --}}
                                        <td class="product-image">
                                            <img src="{{ url($cartItem->product->imagepath) }}" alt="">
                                        </td>
                                        {{-- Product name --}}
                                        <td class="product-name">{{ $cartItem->product->name }}</td>
                                        {{-- Product price --}}
                                        <td class="product-price">{{ $cartItem->product->price }} LE</td>
                                        {{-- Product quantity --}}
                                        <td class="product-total">{{ $cartItem->quantity }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

                {{-- Checkout button --}}
                <div class="cart-buttons" style="display: inline-block;"> 
                    <a href="{{ route('checkout.index', $userCart) }}" class="boxed-btn">
                        اكمال عملية الشراء
                    </a>
                </div>  
            </div>
        </div>
    </div>
@endif

@endsection
