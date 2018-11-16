<header class="top-navigation-bar">
    <div class="top-navigation-bar-left">
        <a href="{{url('/')}}"><img alt="Logo lukolandie" src="{{asset('img/logo.png')}}"></a>
    </div>
    <div class="top-navigation-bar-middle">
        <input type="text" name="searchText">
        <button class="black-bcg-button" type="submit">Hladaj</button>
    </div>
    <div class="top-navigation-bar-right">
        <a class="search-topbar-small" role="button" href=""><i class="fa fa-search"></i></a>
        @guest
            <a class="link-topbar-small" role="button" href="{{url('/login')}}">
                <div class="link-topbar-big">Prihlasenie</div>
                <i class="fas fa-user-circle"></i> </a>
        @else
            <a class="link-topbar-small" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
            <a class="link-topbar-small" role="button" href="checkout1.html">
            <div class="link-topbar-big">Nakupny kosik</div>
            <i class="fa fa-shopping-cart"></i> </a>
        <div class="menu-topbar-small" role="button" id="menu-button" onclick="OpenNav()"><i class="fa fa-bars"></i>
        </div>
        <nav class="top-ctg-menu" id="top-ctg-menu">
            <ul>
                <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i>
                    </a></li>
                <li><a href="../html/categoryPreview.html">Luky</a></li>
                <li><a href="">Šípy</a></li>
                <li><a href="">Príslušenstvo</a></li>
                <li><a href="">Terčovnice</a></li>
                <li><a href="">Oblečenie</a></li>
            </ul>
        </nav>
    </div>
</header>