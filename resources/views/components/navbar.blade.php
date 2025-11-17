@php($user = Auth::user())
@php($routeName = request()->route() ? request()->route()->getName() : '')

<nav class="fb-nav">
    <div id="header">
        <div class="inner nav-container">
            <div id="topline">
                <a href="{{ route('info') }}">Fanbaza — пространство для фанатов и их историй</a>
            </div>

            <a href="{{ route('main') }}" class="logo" aria-label="Fanbaza">
                <span>Fanbaza</span>
            </a>

            <div class="top">
                <div class="priem">
                    <a href="{{ route('info') }}">Редакция Fanbaza</a><br/>
                    tg: @alania_science
                </div>

                <div class="search">
                    <form method="GET" action="{{ route('main') }}">
                        <input
                            class="text"
                            type="text"
                            name="q"
                            placeholder="Эта штука не работает"
                            value="{{ request('q') }}"
                            aria-label="Поиск по сайту"
                        >
                        <button class="submit" type="submit" aria-label="Найти">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M8.5 2a6.5 6.5 0 014.999 10.64l3.43 3.43-1.414 1.414-3.43-3.43A6.5 6.5 0 118.5 2zm0 2a4.5 4.5 0 100 9 4.5 4.5 0 000-9z" fill="currentColor"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="lang btn">
                    <a href="{{ route('main') }}" class="btn current">RU</a>
                    <span class="btn muted">EN</span>
                </div>

                <div class="lkmenu">
                    @auth
                        <a href="{{ route('profile.show', $user) }}" class="lk-button">
                            {{ \Illuminate\Support\Str::limit($user->name, 18) }}
                        </a>
                        <div class="lk-list">
                            <a href="{{ route('profile.show', $user) }}" class="lk-item"><span>Профиль</span></a>
                            <a href="{{ route('profile.edit') }}" class="lk-item"><span>Настройки</span></a>
                            <form method="POST" action="{{ route('logout') }}" class="lk-item lk-logout">
                                @csrf
                                <button type="submit"><span>Выйти</span></button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="lk-button">Войти</a>
                        <div class="lk-list">
                            <a href="{{ route('register') }}" class="lk-item"><span>Регистрация</span></a>
                            <a href="{{ route('info') }}" class="lk-item"><span>О Fanbaza</span></a>
                        </div>
                    @endauth
                </div>

                <a href="#" class="menubtn btn" aria-label="Меню"></a>
            </div>

            <div class="menu">
                <div class="menu-pills">
                    <a href="{{ route('main') }}" class="pill {{ $routeName === 'main' ? 'active' : '' }}">Лента</a>
                    <a href="{{ route('info') }}#popular" class="pill">О фанбазе</a>
                    @auth
                        <a href="{{ route('post.create') }}" class="pill accent">Создать пост</a>
                    @else
                        <a href="{{ route('register') }}" class="pill accent">Присоединиться</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>