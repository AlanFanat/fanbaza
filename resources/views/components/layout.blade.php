<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{isset($title) ? "$title - FanBaza" : "FanBaza" }}</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;

            /* Делает страницу на всю высоту и распределяет блоки */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        :root {
            --fb-dark: #2d2d2e;
            --fb-accent: #ebb30d;
            --fb-gray: #f4f4f4;
        }

        .blog-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
            box-sizing: border-box;
        }

        /* ====== Навигация в стиле b.html ====== */
        .fb-nav {
            background: #fff;
            border-bottom: 1px solid #eee;
        }

        #header {
            background: #fff;
            border-bottom: 1px solid #eee;
        }

        #header .inner {
            width: 100%;
            margin: 0 auto;
            padding: 31px 24px 32px 40px;
            position: relative;
            box-sizing: border-box;
        }

        #topline {
            font-size: 14px;
            padding: 4px 0;
            color: var(--fb-dark);
        }

        #topline a {
            color: var(--fb-accent);
            text-decoration: none;
        }

        #topline a:hover {
            text-decoration: underline;
        }

        #header .logo {
            width: 170px;
            height: 118px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #111827, #374151);
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: absolute;
            top: 48px;
            left: 40px;
            border-radius: 8px;
            text-decoration: none;
        }

        #header .logo span {
            transform: rotate(-8deg);
        }

        #header .top {
            margin-left: 240px;
            display: flex;
            align-items: flex-start;
            justify-content: flex-end;
            gap: 24px;
            flex-wrap: wrap;
        }

        #header .priem {
            font-size: 14px;
            line-height: 1.6;
            color: var(--fb-dark);
        }

        #header .priem a {
            color: var(--fb-dark);
            font-weight: 600;
            text-decoration: none;
        }

        #header .search {
            position: relative;
            flex: 1;
            min-width: 220px;
            max-width: 360px;
        }

        #header .search .text {
            width: 100%;
            height: 42px;
            border: 3px solid var(--fb-accent);
            border-radius: 4px;
            padding: 0 48px 0 14px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.2s ease;
        }

        #header .search .text:focus {
            border-color: var(--fb-dark);
        }

        #header .search .submit {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 50%;
            background: var(--fb-accent);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        #header .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--fb-gray);
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 14px;
            text-decoration: none;
            color: var(--fb-dark);
            border: none;
            cursor: pointer;
        }

        #header .btn.current {
            background: var(--fb-accent);
            color: #fff;
        }

        #header .btn.muted {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: default;
        }

        #header .lang {
            display: inline-flex;
            gap: 6px;
        }

        #header .lkmenu {
            position: relative;
            z-index: 50;
            padding-bottom: 16px;
        }

        #header .lkmenu .lk-button {
            display: block;
            padding: 10px 16px;
            background: var(--fb-accent);
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
        }

        #header .lkmenu .lk-list {
            display: none;
            position: absolute;
            top: calc(100% - 8px);
            right: 0;
            width: 200px;
            background: #fff;
            box-shadow: 0 14px 40px -18px rgba(0,0,0,0.6);
            border-radius: 8px;
            overflow: hidden;
            z-index: 60;
            pointer-events: auto;
        }

        #header .lkmenu:hover .lk-list,
        #header .lkmenu:focus-within .lk-list {
            display: block;
        }

        #header .lkmenu .lk-item {
            display: block;
            padding: 12px 20px;
            border-top: 1px solid #f2f2f2;
            text-decoration: none;
            color: var(--fb-dark);
            position: relative;
            background: #fff;
            text-align: center;
        }

        #header .lkmenu .lk-item button,
        #header .lkmenu .lk-item a {
            width: 100%;
            display: inline-block;
        }

        #header .lkmenu .lk-item:first-child {
            border-top: none;
        }

        #header .lkmenu .lk-item:hover {
            background: var(--fb-gray);
        }

        #header .lkmenu .lk-logout {
            margin: 0;
            border: none;
        }

        #header .lkmenu .lk-logout button {
            border: none;
            background: transparent;
            width: 100%;
            height: 100%;
            font-size: 14px;
            cursor: pointer;
            color: var(--fb-dark);
        }

        #header .menubtn {
            width: 42px;
            height: 42px;
            position: relative;
        }

        #header .menubtn:before,
        #header .menubtn:after {
            content: "";
            position: absolute;
            left: 10px;
            right: 10px;
            height: 2px;
            background: var(--fb-dark);
        }

        #header .menubtn:before {
            top: 14px;
            box-shadow: 0 8px 0 var(--fb-dark);
        }

        #header .menubtn:after {
            bottom: 14px;
        }

        #header .menu {
            margin-left: 180px;
            margin-top: 32px;
        }

        #header .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #header .menu .menu-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        #header .menu .menu-pills .pill {
            padding: 6px 18px;
            border-radius: 999px;
            background: #fff;
            border: 1px solid #f0f0f0;
            color: var(--fb-dark);
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        #header .menu .menu-pills .pill:hover {
            border-color: var(--fb-accent);
        }

        #header .menu .menu-pills .pill.active {
            background: var(--fb-accent);
            color: #fff;
            border-color: var(--fb-accent);
        }

        #header .menu .menu-pills .pill.accent {
            background: var(--fb-dark);
            color: #fff;
            border-color: var(--fb-dark);
        }

        #header .menu .m1 {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        #header .menu .m1 > li {
            position: relative;
        }

        #header .menu .m1 > li > a {
            color: var(--fb-dark);
            text-decoration: none;
            font-weight: 600;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 12px;
            border: 1px solid transparent;
            transition: all 0.2s ease;
            min-width: 260px;
            background: #fff;
            box-shadow: 0 6px 18px -15px rgba(0, 0, 0, 0.6);
        }

        #header .menu .m1 > li > a:hover {
            background: var(--fb-gray);
            border-color: #ececec;
        }

        #header .menu .menu-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff;
            border: 1px solid #ececec;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--fb-dark);
        }

        #header .menu .menu-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        #header .menu .menu-text small {
            font-size: 12px;
            font-weight: 400;
            color: #6b6b6f;
        }

        #header .menu .m1 > li.menu-item-has-children > ul {
            display: none;
            position: absolute;
            background: #fff;
            box-shadow: 0 13px 20px -18px rgba(0,0,0,0.8);
            border-radius: 8px;
            padding: 12px 0;
            min-width: 240px;
            z-index: 9;
            margin-top: 6px;
        }

        #header .menu .m1 > li.menu-item-has-children:hover > ul {
            display: block;
        }

        #header .menu .m1 > li > ul li a {
            display: block;
            padding: 9px 20px;
            color: var(--fb-dark);
            text-decoration: none;
            white-space: nowrap;
        }

        #header .menu .m1 > li > ul li a:hover {
            background: var(--fb-accent);
            color: #fff;
        }

        #header .menu .menu-highlights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        #header .menu .menu-card {
            border-radius: 16px;
            padding: 20px;
            background: #fff8e8;
            border: 1px solid rgba(235, 179, 13, 0.3);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #header .menu .menu-card.accent {
            background: #2d2d2e;
            color: #fff;
            border-color: transparent;
        }

        #header .menu .menu-card .card-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 11px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            background: rgba(0,0,0,0.08);
            color: inherit;
            width: fit-content;
        }

        #header .menu .menu-card.accent .card-badge {
            background: rgba(255,255,255,0.15);
        }

        #header .menu .menu-card h4 {
            margin: 0;
            font-size: 18px;
        }

        #header .menu .menu-card p {
            margin: 0;
            font-size: 14px;
            color: inherit;
            opacity: 0.85;
        }

        #header .menu .menu-card a {
            margin-top: auto;
            color: inherit;
            font-weight: 600;
            text-decoration: none;
        }

        #header .menu .menu-card a:hover {
            text-decoration: underline;
        }

        /* ====== Главный блок ====== */
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);

            /* Растягиваем контент, чтобы футер ушёл вниз */
            flex: 1;
            width: 100%;
        }

        /* ====== Подвал ====== */
        footer {
            background: #111827;
            color: #9ca3af;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        footer .footer-copy {
            font-size: 14px;
        }

        .footer-telegram {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #34d399;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.03em;
        }

        .footer-telegram svg {
            width: 22px;
            height: 22px;
        }
    </style>

    {{-- Дополнительные стили из шаблонов через @push('styles') --}}
    @stack('styles')
</head>
<body>

    <!-- Навигационное меню -->
    <x-navbar />

    <!-- Основной контент -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Подвал -->
    <x-footer />

</body>
</html>
