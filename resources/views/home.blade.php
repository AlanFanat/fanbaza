<x-layout title="Посты">
    <div class="blog-container py-5">        
        {{-- Заголовок и кнопка создания --}}
        <div class="blog-header">
            <div>
                <p class="eyebrow">Лента сообщества</p>
                <h2>Блог</h2>
                <p class="subtitle">Читайте истории участников и создавайте свои посты</p>
            </div>
            <a href="{{ route('post.create') }}" class="create-post-button">➕ Создать пост</a>
        </div>

        {{-- Раздел без постов --}}
        @if ($posts->isEmpty())
            <div class="empty-state shadow-sm">
                <h4>Пока записей нет</h4>
                <p>Станьте первым автором и поделитесь своими мыслями с сообществом.</p>
                <a href="{{ route('post.create') }}" class="btn submit-btn mt-3">Написать пост</a>
            </div>
        @else
            {{-- Список постов --}}
            <div class="posts-grid">
            @foreach ($posts as $post)
                <article class="post-card">
                    <div class="post-head">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <div class="post-meta">
                            Автор: <a href="#" class="post-author">{{ $post->user->name }}</a>
                            <span class="post-time">• {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>{{ $post->body }}</p>
                    </div>
                    <div class="post-actions">
                        <button class="like-button" data-post-id="{{ $post->id }}">👍 Лайк (<span class="like-count">{{ $post->likes_count }}</span>)</button>
                        <button class="dislike-button" data-post-id="{{ $post->id }}">👎 Дизлайк (<span class="dislike-count">{{ $post->dislikes_count }}</span>)</button>
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

    {{-- Стили страницы --}}
    @push('styles')
        <style>
            .blog-container {
                max-width: 900px;
                margin: 0 auto;
                padding: 0 20px 60px;
            }

            .blog-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 30px;
                margin-bottom: 10px;
            }

            .eyebrow {
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 0.15em;
                color: #9ca3af;
                margin-bottom: 6px;
            }

            .blog-header h2 {
                font-size: 2.5rem;
                color: #f39c12;
                margin: 0;
            }

            .subtitle {
                color: #6b7280;
                margin: 10px 0 0;
            }

            .create-post-button {
                padding: 12px 24px;
                background-color: #f39c12;
                color: #fff;
                border-radius: 8px;
                font-weight: 600;
                text-decoration: none;
                transition: box-shadow 0.3s ease, transform 0.3s ease, background-color 0.3s;
                white-space: nowrap;
                box-shadow: 0 10px 20px rgba(243, 156, 18, 0.2);
            }

            .create-post-button:hover {
                background-color: #e65c00;
                transform: translateY(-2px);
            }

            .empty-state {
                background: #fff;
                border-radius: 12px;
                padding: 40px;
                text-align: center;
                border: 1px dashed #fcd5b5;
            }

            .posts-grid {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .post-card {
                background-color: #fff;
                border-radius: 14px;
                padding: 30px;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .post-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
            }

            .post-title {
                color: #1f2937;
                margin-bottom: 10px;
            }

            .post-meta {
                font-size: 0.95rem;
                color: #6b7280;
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .post-author {
                color: #28a745;
                text-decoration: none;
                font-weight: 600;
            }

            .post-time {
                color: #9ca3af;
            }

            .post-content {
                color: #374151;
                line-height: 1.6;
                margin: 15px 0 20px;
            }

            .post-actions {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }

            .post-actions button {
                padding: 10px 18px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-weight: 600;
                color: #fff;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .like-button {
                background-color: #28a745;
                box-shadow: 0 10px 20px rgba(40, 167, 69, 0.2);
            }

            .dislike-button {
                background-color: #dc3545;
                box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2);
            }

            .post-actions button:hover {
                transform: translateY(-2px);
            }

            .btn.submit-btn {
                display: inline-block;
                padding: 12px 24px;
                border-radius: 8px;
                background-color: #28a745;
                color: #fff;
                font-weight: 600;
                text-decoration: none;
            }

            @media (max-width: 640px) {
                .blog-header {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .post-card {
                    padding: 24px;
                }
            }
        </style>
    @endpush
</x-layout>