<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application E-Commerce développée avec le Framework Laravel 6 par Ludovic Guénet">
    <meta name="author" content="Ludovic Guénet">
    @yield('extra-meta')

    <title>Laravel 6 E-Commerce</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra-script')

    <!-- Bootstrap 4 -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <!-- FontAwesome 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- template importé CSS et jquery -->
    <!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
         <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
 		<!-- Slick -->
         <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
         <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

 		<!-- nouislider -->
         <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
 		<!-- Font Awesome Icon -->
         <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
 		<!-- Custom stlylesheet -->
         <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Ecommerce App CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/ecommerce.css') }}"> --}}
  </head>

  <body>
{{-- <div> --}}
    	<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +212-699-00-99</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> contact@issam-elyazri.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Boulevard Taza</a></li>
					</ul>
					<ul class="header-links pull-right">
                        <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                        @include('partials.auth')
						{{-- <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li> --}}
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
                        {{-- @foreach (Cart::content() as $product) --}}
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="{{ asset('img/logo.png') }}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
                                @include('partials.search')
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
                                <!-- Cart -->
                                {{-- @if (Cart::count() > 0) --}}

								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ Cart::count() }}</div>
									</a>
									<div class="cart-dropdown">
                                        @foreach (Cart::content() as $product)
										<div class="cart-list">

											<div class="product-widget">

												<div class="product-img">
                                                    <img src="{{ asset('storage/' . $product->model->image) }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="{{ route('products.show', ['slug' => $product->model->slug]) }}">{{ $product->model->title }}</a></h3>
													<h4 class="product-price"><span class="qty">{{  $product->qty }}x</span>{{ getPrice($product->subtotal()) }}</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>

                                            </div>

                                             </div>
                                             @endforeach

                                          {{-- <div class="container">  *****ancien headerµµµµ --}}

                                            {{-- @endif --}}
                                            {{-- @endforeach --}}
                                            {{-- <header class="blog-header pt-3">
           <a class="text-muted" href="">Panier <span class="badge badge-pill badge-info text-white">{{ Cart::count() }}</span></a>
          <a class="blog-header-logo" style="color: #17a2b8 !important;" href="{{ route('products.index') }}"><img src="{{ asset('img/logo.png') }}" width="200" alt=""></a>
          @include('partials.search')
          @include('partials.auth')
    </header> --}}

										<div class="cart-summary">

											<small>{{ Cart::count() }} Item(s) selected</small>
											{{-- <h5>SUBTOTAL: $2940.00</h5> --}}
										</div>
										<div class="cart-btns">
											<a style="width: 100%" href="{{ route('cart.index') }}">View Cart</a>
											{{-- <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a> --}}
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
        <!-- /HEADER -->
        		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
                {{-- <div class="row"> --}}
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="navbar-nav nav main-nav">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        @foreach (App\Category::all() as $category)
                        <li><a href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a></li>
                                          @endforeach
						{{-- <li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li> --}}
					</ul>
					<!-- /NAV -->
                </div>
            {{-- </div> --}}
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->


    <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      {{-- @foreach (App\Category::all() as $category)
      <a class="p-2 text-muted" href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
      @endforeach --}}
    </nav>
  </div>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul class="mb-0 mt-0">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif


  @if (request()->input('q'))
    <h6>{{ $products->total() }} résultat(s) pour la recherche "{{ request()->q }}"</h6>
  @endif
  <div class="row mb-2">
  @yield('content')
  </div>
</div>


	<!-- FOOTER -->
    <footer id="footer" style="margin-top: 5%;">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Boulevard Taza</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> +212-699-00-99</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>contact@easystore   .com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                @foreach (App\Category::all() as $category)
              <li><a href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a></li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>


        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Issam can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://issam-elyazri.com" target="_blank">Issam</a>
                        <!-- Link back to Issam can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                    <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->
</div>
@yield('extra-js')
<script src={{ asset('js/jquery.min.js') }}></script>
		<script src={{ asset('js/bootstrap.min.js') }}></script>
		<script src={{ asset('js/slick.min.js') }}></script>
		<script src={{ asset('js/nouislider.min.js') }}></script>
		<script src={{ asset('js/jquery.zoom.min.js') }}></script>
		<script src={{ asset('js/main.js') }}></script>
</body>
</html>


