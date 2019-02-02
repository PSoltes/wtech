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
            <div class="link-topbar-small" role="button" onclick="OpenLogin()">
                <div class="link-topbar-big">Ahoj {{Auth::user()->name}}</div>
                <i class="fas fa-user-circle"></i> </div>
        @endguest
            <a class="link-topbar-small" role="button" href="{{url('checkout1')}}">
            <div class="link-topbar-big">Nakupny kosik</div>
            <i class="fa fa-shopping-cart"></i> </a>
        <div class="menu-topbar-small" role="button" id="menu-button" onclick="OpenNav()"><i class="fa fa-bars"></i>
        </div>
        <nav class="top-ctg-menu" id="top-ctg-menu">
            <ul>
                <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i>
                    </a></li>
                    @foreach($categories as $category)
                        <li><a href="{{url('/'. $category->name)}}">{{$category->name}}</a></li>
                    @endforeach
            </ul>
        </nav>
        @auth
        <nav class="profile-nav">
            <ul>
                <li><a href="javascript:void(0)" class="closebtn" onclick="closeLogin()"><i class="fas fa-times"></i>
                    </a></li>
               <li><a href="#">Moj profil</a></li>
                <li><a href="#">Moje objednavky</a></li>
                @if(Auth::user()->isAdmin())
                    <li><a href="http://127.0.0.1:8080">Admin rozhranie</a></li>
                @endif
               <li><a class="link-topbar-small" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
               </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>
        @endauth
    </div>
</header>