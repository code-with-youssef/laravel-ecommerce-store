@extends('Layouts.master')

@section('content')
	
	<!-- product section -->
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
	<!-- end product section -->

@endsection

