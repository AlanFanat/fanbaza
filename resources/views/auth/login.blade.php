<x-layout title="Вход">
    <div class="container">
        <h1 style="margin-top: 0; margin-bottom: 20px;">Вход в аккаунт</h1>

        @if (session('status'))
            <div style="padding: 10px 15px; border-radius: 6px; background:#ecfdf3; color:#166534; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" style="display:flex; flex-direction:column; gap:15px; max-width:420px;">
            @csrf

            <div>
                <label for="email" style="display:block; font-weight:bold; margin-bottom:4px;">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('email')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" style="display:block; font-weight:bold; margin-bottom:4px;">Пароль</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('password')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <label style="display:flex; align-items:center; gap:8px; font-size:0.9em;">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Запомнить меня</span>
            </label>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:5px;">
                @if (Route::has('password.request'))
                    {{-- <a href="{{ route('password.request') }}" style="font-size:0.9em; color:#2563eb; text-decoration:none;">
                        Забыли пароль?
                    </a> --}}
                    <p>Забыли пароль? Ахахахахахахахахахахааххаах</p>
                @endif

                <button type="submit" style="background:#f59e0b; border:none; color:#111827; padding:10px 18px; border-radius:999px; font-weight:bold; cursor:pointer;">
                    Войти
                </button>
            </div>

            <p style="margin-top:10px; font-size:0.9em;">
                Нет аккаунта?
                <a href="{{ route('register') }}" style="color:#2563eb; text-decoration:none;">Зарегистрироваться</a>
            </p>
        </form>
    </div>
</x-layout>
