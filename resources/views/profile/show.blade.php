<x-layout :title="$profileUser->name">
    <section class="profile-page container py-5">
        <div class="profile-card">
            <div class="avatar">
                {{ strtoupper(mb_substr($profileUser->name, 0, 1)) }}
            </div>
            <div class="profile-info">
                <h1>{{ $profileUser->name }}</h1>
                {{-- <p class="profile-email">{{ $profileUser->email }}</p> --}}
                <p class="profile-stats">
                    Всего постов: <strong>{{ $posts->total() }}</strong>
                </p>

                {{-- 🆕 БЛОК С НОВЫМИ ПОЛЯМИ --}}
                <div class="profile-details mt-4">
                    <h3 style="font-size: 1.25em; margin-bottom: 0.5em;">Дополнительная информация</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.4em;">
                            <strong>💉 Группа крови:</strong> {{ $profileUser->blood_type ?? 'Не указано' }}
                        </li>
                        <li style="margin-bottom: 0.4em;">
                            <strong>✨ Знак зодиака:</strong> {{ $profileUser->zodiac_sign ?? 'Не указано' }}
                        </li>
                        <li style="margin-bottom: 0.4em;">
                            <strong>🐾 Любимое животное:</strong> {{ $profileUser->favorite_animal ?? 'Не указано' }}
                        </li>
                        <li style="margin-bottom: 0.4em;">
                            <strong>💌 Сокровенное желание:</strong> {{ $profileUser->secret_wish ?? 'Не указано' }}
                        </li>
                    </ul>
                </div>
                {{-- -------------------------- --}}
            </div>
        </div>

        <div class="profile-posts mt-5">
            <h2>Посты пользователя</h2>
            @if ($posts->isEmpty())
                <p class="text-muted">Пока нет ни одного поста.</p>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($posts as $post)
                        <article class="post">
                            <h3 class="post-title">{{ $post->title }}</h3>
                            <div class="post-meta">
                                Опубликовано {{ $post->created_at->diffForHumans() }}
                            </div>
                            <div class="post-content">
                                {{ \Illuminate\Support\Str::limit($post->body, 180) }}
                            </div>
                            <div class="post-actions">
                                <div class="vote-counts">
                                    👍 {{ $post->likes_count }} &nbsp;|&nbsp; 👎 {{ $post->dislikes_count }}
                                </div>
                                <a href="{{ route('main') }}#post-{{ $post->id }}" class="post-link">Перейти к посту</a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $posts->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </section>

    @push('styles')
        <style>
            .profile-page {
                max-width: 960px;
                margin: 0 auto;
            }
            .profile-card {
                display: flex;
                align-items: top;
                gap: 20px;
                background: #fff;
                padding: 20px;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            }
            .avatar {
                width: 72px;
                height: 72px;
                border-radius: 50%;
                background: #f39c12;
                color: #fff;
                font-weight: bold;
                font-size: 2rem;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .profile-info h1 {
                margin: 0;
            }
            .profile-email {
                color: #6c757d;
                margin-bottom: 0.5rem;
            }
            .profile-posts h2 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }
            .post {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }
            .post-title {
                margin-top: 0;
                font-size: 1.25rem;
            }
            .post-meta {
                font-size: 0.9rem;
                color: #6c757d;
                margin-bottom: 10px;
            }
            .post-actions {
                margin-top: 12px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.9rem;
            }
            .post-link {
                color: #0d6efd;
                text-decoration: none;
                font-weight: 600;
            }
            .post-link:hover {
                text-decoration: underline;
            }
        </style>
    @endpush
</x-layout>

