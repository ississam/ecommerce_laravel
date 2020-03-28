<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    @yield('extra-meta')
    <title>ECOMMERCE</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('le-script')

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Favicons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="{{asset('css/ecommerce.css')}}">
{{-- <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml"> --}}
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      <a class="text-muted" href={{route('cart.index')}}>Panier <span class="badge badge-pill badge-dark">{{Cart::count()}}</span> </a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{route('products.index')}}">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
   @include('partials.search')
   @include('partials.auth')

      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
   @foreach (App\Category::all() as $category)
    <a class="p-2 text-muted" href="{{route('products.index',['categorie'=>$category->slug])}}">{{$category->name}}</a>
   @endforeach


    </nav>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
{{session('success')}}
  </div>

  @endif
  @if (session('error'))
  <div class="alert alert-danger">
    {{session('error')}}
  @endif


  {{-- <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div> --}}
@if (request()->input())
<h6>{{$products->total()}} résultat(s) pour la recherche "{{request()->sr}}</h6>

@endif
  <div class="row mb-2">
@yield('content')
  </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
<ul class="mb-0 mt-0">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif



<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
@yield('ex-js')
</body>
</html>
