@extends('layouts.master')
{{-- <h2>index product</h2> --}}
@section('content')

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div id="store" class="col-md-12">

						<!-- store products -->
						<div class="row">
                            <!-- product -->
                            @foreach ($products as $product)
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src={{ asset('storage/' . $product->image) }}  alt="">
										<div class="product-label">
											{{-- <span class="sale">-30%</span>
											<span class="new">NEW</span> --}}
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">@foreach ($product->categories as $category)
                                            {{ $category->name }}{{ $loop->last ? '' : ', '}}
                                        @endforeach</p>
										<h3 class="product-name"><a href="#">{{ $product->title }}</a></h3>
										<h4 class="product-price">$980.00
{{ $product->subtitle }}<del class="product-old-price">$990.00</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">

											<button class="quick-view"> <a href="{{ route('products.show', $product->slug) }}" ><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
                                </div>

                            </div>
                            @endforeach
							<!-- /product -->









						<!-- /store products -->


					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /SECTION -->

  {{-- @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-3 d-flex flex-column position-static">
          <small class="d-inline-block text-info mb-2">
            @foreach ($product->categories as $category)
                {{ $category->name }}{{ $loop->last ? '' : ', '}}
            @endforeach
          </small>
          <h5 class="mb-0">{{ $product->title }}</h5>
          <p class="mb-3 text-muted">{{ $product->subtitle }}</p>
          <strong class="display-4 mb-4 text-secondary">{{ $product->getPrice() }}</strong>
          <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-info"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('storage/' . $product->image) }}" alt=""  class="w-100">
        </div>
      </div>
    </div>
  @endforeach

  {{ $products->appends(request()->input())->links() }}
  --}}
@endsection
