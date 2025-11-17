<x-layout title="Создание поста">
    <div class="blog-container py-5">
        <div class="blog-header">
            <div>
                <h2>Поделитесь своей историей</h2>
            </div>
            <a href="{{ route('main') }}" class="create-post-button ghost">⟵ Назад к постам</a>
        </div>

        <div class="form-card shadow-lg">
            {{-- Форма отправляется на маршрут 'posts.store', который соответствует методу store() в контроллере --}}
            <form action="{{ route('post.store') }}" method="POST" class="post-form">
                {{-- Токен CSRF: Защита от Cross-Site Request Forgery. Обязателен в Laravel --}}
                @csrf
                
                {{-- 1. Поле для Заголовка --}}
                <div class="form-group">
                    <label for="title" class="form-label">Заголовок</label>
                    <input 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="title" 
                        name="title" 
                        value="{{ old('title') }}" 
                        required 
                        maxlength="255"
                        placeholder="Например: Мои впечатления от путешествия"
                    >
                    {{-- Отображение ошибки валидации, если она есть --}}
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- 2. Поле для Содержания --}}
                <div class="form-group">
                    <label for="body" class="form-label">Содержание поста</label>
                    <textarea 
                        class="form-control @error('body') is-invalid @enderror" 
                        id="body" 
                        name="body" 
                        rows="8" 
                        required
                        placeholder="Опишите свои мысли, идеи или опыт..."
                    >{{ old('body') }}</textarea>
                    
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                {{-- 3. Кнопки действия --}}
                <div class="form-actions">
                    <button type="submit" class="btn submit-btn">Опубликовать</button>
                    <a href="{{ route('main') }}" class="btn secondary-btn">Отмена</a>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            .blog-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 0 20px 60px;
            }

            .blog-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
                margin-top: 10px;
                gap: 20px;
            }

            .blog-header h2 {
                font-size: 2.3rem;
                color: #f39c12;
                margin: 5px 0 0;
            }

            .eyebrow {
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 0.15em;
                color: #9ca3af;
                margin: 0;
            }

            .create-post-button {
                padding: 10px 20px;
                background-color: #f39c12;
                color: #fff;
                border: none;
                border-radius: 6px;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .create-post-button.ghost {
                background-color: transparent;
                color: #f39c12;
                border: 1px solid rgba(243, 156, 18, 0.25);
            }

            .create-post-button:hover {
                background-color: #e65c00;
                color: #fff;
                box-shadow: 0 10px 20px rgba(230, 92, 0, 0.2);
            }

            .create-post-button.ghost:hover {
                background-color: rgba(243, 156, 18, 0.08);
            }

            .form-card {
                background: #fff;
                border-radius: 12px;
                padding: 35px;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            }

            .post-form {
                display: flex;
                flex-direction: column;
                gap: 25px;
            }

            .form-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .form-label {
                font-weight: 600;
                color: #1f2937;
            }

            .form-control {
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                padding: 14px 16px;
                font-size: 1rem;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
                resize: vertical;
            }

            .form-control:focus {
                border-color: #f39c12;
                box-shadow: 0 0 0 4px rgba(243, 156, 18, 0.15);
            }

            .invalid-feedback {
                color: #dc3545;
                font-size: 0.9rem;
            }

            .form-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                justify-content: flex-end;
            }

            .btn {
                padding: 12px 24px;
                border-radius: 8px;
                font-weight: 600;
                text-decoration: none;
                text-align: center;
                border: none;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .submit-btn {
                background-color: #28a745;
                color: #fff;
                box-shadow: 0 10px 20px rgba(40, 167, 69, 0.2);
            }

            .submit-btn:hover {
                transform: translateY(-2px);
            }

            .secondary-btn {
                background-color: #f3f4f6;
                color: #1f2937;
            }

            .secondary-btn:hover {
                background-color: #e5e7eb;
            }

            @media (max-width: 576px) {
                .blog-header {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .form-card {
                    padding: 25px;
                }
            }
        </style>
    @endpush
</x-layout>