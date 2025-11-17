<x-layout title="Посты">
    <div class="blog-container py-5">
        {{-- Раздел без постов --}}
        @if ($posts->isEmpty())
            <div class="alert alert-warning text-center py-5 shadow-sm" role="alert">
                <h4 class="alert-heading">Нет ни одного поста! 😔</h4>
                <p>Будьте первыми, кто поделится своими мыслями. Нажмите на кнопку выше, чтобы начать!</p>
            </div>
        @else
            {{-- Список постов в виде адаптивной сетки --}}
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($posts as $post)
                <article class="post" id="post-{{ $post->id }}">
                <h2 class="post-title">{{ $post->title }}</h2>
                <div class="post-meta">
                    Автор: <a href="{{ route('profile.show', $post->user) }}" class="post-author">{{ $post->user->name }}</a>
                </div>
                <div class="post-content">
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
                {{-- <div class="post-time">
                    {{ $post->created_at }}
                </div> --}}
                <div class="post-actions">
                    <div class="vote-counts">
                        👍 <span class="like-count">{{ $post->likes_count }}</span>
                        &nbsp;|&nbsp;
                        👎 <span class="dislike-count">{{ $post->dislikes_count }}</span>
                    </div>
                    @auth
                        <form method="POST" action="{{ route('posts.vote', $post) }}">
                            @csrf
                            <input type="hidden" name="value" value="like">
                            <button type="submit" class="like-button">Голосовать 👍</button>
                        </form>
                        <form method="POST" action="{{ route('posts.vote', $post) }}">
                            @csrf
                            <input type="hidden" name="value" value="dislike">
                            <button type="submit" class="dislike-button">Голосовать 👎</button>
                        </form>
                        <form method="POST" action="{{ route('posts.vote.remove', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="reset-button">Сбросить</button>
                        </form>
                    @else
                        <p class="vote-hint">Войдите, чтобы голосовать.</p>
                    @endauth
                </div>
                </article>
            @endforeach
            </div>

            {{-- Пагинация --}}
            @if (method_exists($posts, 'links'))
                <div class="mt-5 d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </div>

    {{-- Добавление простого CSS для эффекта наведения --}}
    @push('styles')
        <style>
            .blog-header {
            max-width: 800px;
            margin: 30px auto 15px auto; /* Отступ сверху и снизу */
            padding: 0 20px;
            display: flex; /* Используем Flexbox для выравнивания */
            justify-content: space-between; /* Распределяем элементы по краям */
            align-items: center; /* Выравниваем по центру по вертикали */
        }

        .blog-header h2 {
            font-size: 2.5em; /* Огромная надпись "Блог" */
            color: #f39c12;
            margin: 0;
        }

        .create-post-button {
            padding: 10px 20px;
            background-color: #f39c12; /* Оранжевый цвет */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none; /* Убираем подчеркивание, если это <a> */
            transition: background-color 0.3s;
            white-space: nowrap; /* Не даем тексту кнопки переноситься */
        }

        .create-post-button:hover {
            background-color: #e65c00;
        }
        /* Контейнер для постов */
        .blog-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* Стили для отдельного поста */
        .post {
            background-color: white;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post-title {
            color: #1f2937;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-top: 0;
        }

        /* Мета-информация (Автор) */
        .post-meta, .post-time {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 15px;
        }

        .post-author {
            color: #28a745; /* Зеленый цвет для ссылки на автора */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .post-author:hover {
            color: #1e7e34;
            text-decoration: underline;
        }

        /* Кнопки лайков/дизлайков */
        .post-actions {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px dashed #ccc;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .post-actions form {
            margin: 0;
        }

        .post-actions button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.1s;
        }

        .like-button {
            background-color: #28a745; /* Зеленый */
            color: white;
        }

        .dislike-button {
            background-color: #dc3545; /* Красный */
            color: white;
        }

        .reset-button {
            background-color: #6c757d;
            color: white;
        }

        .post-actions button:hover {
            transform: translateY(-1px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .vote-counts {
            font-weight: bold;
            color: #333;
            min-width: 140px;
        }

        .vote-hint {
            margin: 0;
            font-size: 0.9em;
            color: #666;
        }
        </style>
    @endpush
</x-layout>