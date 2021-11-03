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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
                <li>
                    <a href="{{url('/mypage')}}">Mypage</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header-title">
        <h1>Rese</h1>
    </div>
</section>