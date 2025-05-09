@extends('Layouts.master')

@section('content')


	@if($categories->isEmpty())
	<div class="full-height-section error-section">
		<div class="full-height-tablecell">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="error-text">
							<i class="fas fa-search" aria-hidden="true"></i>
							<h1>لا توجد اقسام بعد</h1>
							<a href="{{ route('home.index') }}" class="boxed-btn">العودة للصفحة الرئيسية</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@else
	<!-- category section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">اقسام </span> الموقع</h3>
						<p>كل ما تحتاجه باقل الاسعار</p>
					</div>
				</div>
			</div>


			<div class="row">
				     {{-- Loop through categories --}}
                @foreach ($categories as $item)

                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{route('products.index', $item -> id)}}">
									<img src= "{{url($item -> imagepath)}}",
										height="300",
									></a>
                            </div>
                            <h3>{{$item -> name}}</h3>
                        </div>
                    </div>

                @endforeach
                   
			</div>
		</div>
	</div>
	@endif
	<!-- end category section -->

@endsection

