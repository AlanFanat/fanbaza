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
                <label for="email" style="display:block; font-weight:bold; margin-bottom:4px;">Email (Не используйте настоящий)</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('email')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="blood_type" style="display:block; font-weight:bold; margin-bottom:4px;">Группа крови</label>
                <input id="blood_type" type="text" name="blood_type" value="{{ old('blood_type') }}" required
                        style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('blood_type')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="zodiac_sign" style="display:block; font-weight:bold; margin-bottom:4px;">Знак зодиака</label>
                <input id="zodiac_sign" type="text" name="zodiac_sign" value="{{ old('zodiac_sign') }}" required
                        style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('zodiac_sign')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="favorite_animal" style="display:block; font-weight:bold; margin-bottom:4px;">Любимое животное</label>
                <input id="favorite_animal" type="text" name="favorite_animal" value="{{ old('favorite_animal') }}" required
                        style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('favorite_animal')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="secret_wish" style="display:block; font-weight:bold; margin-bottom:4px;">Мои сокровенные желания</label>
                <input id="secret_wish" type="text" name="secret_wish" value="{{ old('secret_wish') }}" required
                        style="width:100%; padding:10px 12px; border-radius:6px; border:1px solid #d1d5db;">
                @error('secret_wish')
                    <div style="color:#b91c1c; font-size:0.9em; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" style="display:block; font-weight:bold; margin-bottom:4px;">Пароль (Выдумайте 8 символов (не надо настоящий (пожалуйста)))</label>
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