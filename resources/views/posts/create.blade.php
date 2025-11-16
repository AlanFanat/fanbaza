<x-layout>
    <div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">➕ Создание Нового Поста</h2>
        </div>
        <div class="card-body">

            {{-- Форма отправляется на маршрут 'posts.store', который соответствует методу store() в контроллере --}}
            <form action="{{ route('post.store') }}" method="POST">
                
                {{-- Токен CSRF: Защита от Cross-Site Request Forgery. Обязателен в Laravel --}}
                @csrf
                
                {{-- 1. Поле для Заголовка --}}
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Заголовок</label>
                    <input 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="title" 
                        name="title" 
                        value="{{ old('title') }}" 
                        required 
                        maxlength="255"
                    >
                    {{-- Отображение ошибки валидации, если она есть --}}
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- 2. Поле для Содержания --}}
                <div class="mb-3">
                    <label for="body" class="form-label fw-bold">Содержание Поста</label>
                    <textarea 
                        class="form-control @error('body') is-invalid @enderror" 
                        id="body" 
                        name="body" 
                        rows="8" 
                        required
                    >{{ old('body') }}</textarea>
                    
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                {{-- 3. Кнопки действия --}}
                <div class="d-flex justify-body-between">
                    <button type="submit" class="btn btn-success btn-lg">Опубликовать Пост</button>
                    <a href="{{ route('main') }}" class="btn btn-secondary align-self-center">Отмена / Назад к списку</a>
                </div>

            </form>
        </div>
    </div>
</div>
</x-layout>