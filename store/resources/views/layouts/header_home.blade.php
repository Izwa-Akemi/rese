<section class="header-section">
    <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <div class="menu-content">
            <ul>
                <li>
                    <a href="{{url('/')}}">HOME</a>
                </li>
                <li>
                    @auth
                    <a href="{{url('/mypage')}}">Mypage</a>
                    @endauth
                    @guest
                    <a href="{{url('/register')}}">Registration</a>
                    @endguest
                </li>
                <li>
                    @guest
                    <a href="{{url('/login')}}">Login</a>
                    @endguest
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
    <div class="header-title">
        <h1>Rese</h1>
    </div>
    <div class="search-contents">
        <form action="{{url('/')}}" method="get">
            <div class="search-contents">
                <div class="area">
                    <select name="area" id="area">
                        <option value="0">All area</option>
                        @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="genle">
                    <select name="genre" id="genre">
                        <option value="All genre">All genre</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search">
                    <lavel><img src="./img/search.jpeg" alt=""></lavel>
                    <input type="search" class="search" name="search" placeholder="Search..." id="search">
                </div>
            </div>
        </form>
    </div>
</section>