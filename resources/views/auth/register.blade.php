<x-layout title="Регистрация">
    <div class="container">
        <h1 style="margin-top: 0; margin-bottom: 20px;">Создание аккаунта</h1>

        <form method="POST" action="{{ route('register') }}" style="display:flex; flex-direction:column; gap:15px; max-width:420px;">
            @csrf

            <div>
                <label for="name" style="display:block; font-weight:bold; margin-bottom:4px;">Имя</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                       style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('name')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email" style="display:block; font-weight:bold; margin-bottom:4px;">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                       style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('email')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" style="display:block; font-weight:bold; margin-bottom:4px;">Пароль</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('password')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" style="display:block; font-weight:bold; margin-bottom:4px;">Подтверждение пароля</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                       style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('password_confirmation')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:5px;">
                <a href="{{ route('login') }}" style="font-size:0.9em; color:#2563eb; text-decoration:none;">
                    Уже есть аккаунт?
                </a>

                <button type="submit" style="background:#f59e0b; border:none; color:#111827; padding:10px 18px; border-radius:999px; font-weight:bold; cursor:pointer;">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</x-layout>
