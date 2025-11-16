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

        /* ====== Навигация ====== */
        nav {
            background: #1f2937;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        nav .logo {
            font-size: 22px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: #e5e7eb;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            color: white;
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
            text-align: center;
            padding: 20px 0;
        }
    </style>
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
