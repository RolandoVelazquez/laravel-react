<div class="navbar-fixed">
    <nav class="nav-extended cyan darken-4">
        <div class="nav-wrapper">
            <a href="{{route('home')}}" class="brand-logo">Perritos</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="{{Route::currentRouteName() === "home"? 'active':''}}"><a href="{{route('home')}}">Home</a></li>
                <li class="{{Route::currentRouteName() === "razas"? 'active':''}}"><a href="{{route('razas')}}">Razas</a></li>

            </ul>
        </div>
        @yield('nav-content')
    </nav>
</div>

<ul class="sidenav" id="mobile-demo">
    <li class="{{Route::currentRouteName() === "home"? 'active':''}}"><a href="{{route('home')}}">Home</a></li>
    <li class="{{Route::currentRouteName() === "razas"? 'active':''}}"><a href="{{route('razas')}}">Razas</a></li>

</ul>

