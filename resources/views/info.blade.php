<x-layout title="О Fanbaza">
    <div class="info-hero">
        <p class="eyebrow">Fanbaza</p>
        <h1>Место, где фанаты становятся авторами</h1>
        <p class="lead">
            Мы собираем истории, фан-арты и репортажи от людей, которые горят любимыми
            вселенными. Fanbaza помогает находить единомышленников, делиться вдохновением
            и поддерживать друг друга.
        </p>
        <div class="hero-actions">
            <a href="{{ route('register') }}" class="btn primary">Присоединиться</a>
            <a href="{{ route('main') }}" class="btn ghost">Открыть ленту</a>
        </div>
    </div>

    <section class="info-grid">
        <article>
            <h3>Миссия</h3>
            <p>
                Создаём дружелюбное пространство для фанатов разных жанров: от комиксов
                до документалистики. Каждый может рассказать свою историю и получить
                честную обратную связь.
            </p>
        </article>
        <article>
            <h3>Что внутри</h3>
            <ul>
                <li>Лента постов и подборок редакции</li>
                <li>Гайды и задания для авторов</li>
                <li>Голосования и тематические недели</li>
            </ul>
        </article>
        <article>
            <h3>Команда</h3>
            <p>
                Редакторы Fanbaza — фанаты со стажем. Мы читаем каждый пост, делаем
                подборки и отвечаем в чате поддержки. Пишите нам: <strong>tg @alania_science</strong>.
            </p>
        </article>
    </section>

    <section class="info-split">
        <div>
            <h4>Для авторов</h4>
            <p>
                Заполняйте профиль, прикрепляйте визуальные материалы и делитесь ссылками
                на источники вдохновения. Статьи попадают в подборки автоматически, если
                собирают положительные реакции.
            </p>
        </div>
        <div>
            <h4>Для читателей</h4>
            <p>
                Подписывайтесь на любимых создателей, голосуйте за лучшие посты недели и
                сохраняйте подборки, чтобы вернуться к ним позже.
            </p>
        </div>
    </section>

    <section class="info-contact">
        <h4>Связаться с нами</h4>
        <p>Пишите в телеграм: <a href="https://t.me/alania_science" target="_blank">@alania_science</a></p>
        <p>Или оставьте заявку через форму обратной связи в профиле.</p>
    </section>

    @push('styles')
        <style>
            .info-hero {
                max-width: 720px;
                margin: 0 auto 40px auto;
                text-align: center;
            }
            .info-hero .eyebrow {
                text-transform: uppercase;
                letter-spacing: 0.25em;
                font-size: 11px;
                color: #a1a1aa;
            }
            .info-hero h1 {
                font-size: 38px;
                margin: 10px 0;
                color: #1f2937;
            }
            .info-hero .lead {
                font-size: 18px;
                color: #4b5563;
                margin-bottom: 24px;
            }
            .hero-actions {
                display: flex;
                justify-content: center;
                gap: 12px;
                flex-wrap: wrap;
            }
            .hero-actions .btn {
                padding: 10px 20px;
                border-radius: 999px;
                text-decoration: none;
                font-weight: 600;
                border: 1px solid #111827;
            }
            .hero-actions .btn.primary {
                background: #111827;
                color: #fff;
            }
            .hero-actions .btn.ghost {
                background: transparent;
                color: #111827;
            }
            .info-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 20px;
                margin-bottom: 36px;
            }
            .info-grid article {
                background: #fff;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 14px 30px -20px rgba(0,0,0,0.4);
            }
            .info-grid ul {
                padding-left: 18px;
                margin: 0;
                color: #4b5563;
            }
            .info-grid li {
                margin-bottom: 6px;
            }
            .info-split {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 24px;
                padding: 24px;
                background: #fff8e8;
                border-radius: 12px;
                margin-bottom: 36px;
            }
            .info-contact {
                text-align: center;
                padding: 24px;
                border: 1px solid rgba(17,24,39,0.1);
                border-radius: 12px;
                background: #fff;
            }
            .info-contact a {
                color: #111827;
                font-weight: 600;
                text-decoration: none;
            }
        </style>
    @endpush
</x-layout>