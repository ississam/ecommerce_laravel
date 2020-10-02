<!-- Authentication Links -->
@guest
	{{-- <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li> --}}

        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

    @if (Route::has('register'))

            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

    @endif
@else

        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" style=" color: #FFFFFF" ><i class="fa fa-user-o" style=" color:  #FF0000"></i>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>


            <ul>
                <div class="dropdown-menu" style="background-color: #1E1F29" aria-labelledby="navbarDropdown">
                <li>
            <a class="dropdown-item" href="{{ route('home') }}">Mes commandes</a>
        </li> </br>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </div>
    </ul>




@endguest
