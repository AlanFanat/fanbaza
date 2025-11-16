<x-layout title="Посты">
    <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4">📝 Последние Посты</h1>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Создать новый пост</a>
    </div>

    @if ($posts->isEmpty())
        <div class="alert alert-info" role="alert">
            Постов пока нет. Будьте первыми!
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            {{-- Цикл по коллекции $posts, переданной из контроллера --}}
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        {{-- Заголовок карточки --}}
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                {{-- Ссылка на страницу просмотра отдельного поста --}}
                                <a href="#" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h5>
                        </div>

                        {{-- Тело карточки --}}
                        <div class="card-body">
                            {{-- Отображение краткого содержания (первых 150 символов) --}}
                            <p class="card-text text-muted">
                                {{ Str::limit($post->body, 150) }}
                            </p>
                        </div>

                        {{-- Футер карточки с метаданными --}}
                        <div class="card-footer bg-white border-top-0">
                            <small class="text-muted">
                                Опубликовано: {{ $post->created_at->format('d M Y') }}
                            </small>
                            @if (isset($post->user))
                                <br>
                                <small class="text-info">
                                    Автор: {{ $post->user->name }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Пагинация (если используется) --}}
        {{-- Если в контроллере вы использовали Post::latest()->paginate(10) вместо get() --}}
        {{-- <div class="mt-4">
            {{ $posts->links() }}
        </div> --}}
    @endif
    </div>
</x-layout>