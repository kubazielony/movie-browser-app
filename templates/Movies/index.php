<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Movies | Movie Browser</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;

            background:
                radial-gradient(circle at 50% 0%,
                    #2a1014 0%,
                    #151820 35%,
                    #0b0d12 80%);

            color: #f5f5f5;
            min-height: 100vh;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 22px 60px;

            background: rgba(11, 13, 18, 0.9);

            border-bottom: 1px solid #292e38;

            backdrop-filter: blur(10px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;

            color: #f5f5f5;

            font-size: 24px;
            font-weight: bold;

            text-decoration: none;

            letter-spacing: 1px;
        }

        .logo span {
            color: #e50914;
            font-size: 27px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .welcome {
            display: flex;
            align-items: center;

            color: #9ca3af;

            padding: 9px 5px;

            font-size: 14px;
        }

        .username {
            color: #f5f5f5;
            font-weight: bold;
            margin-left: 5px;
        }

        /* =========================
           BUTTONS
        ========================= */

        .button {
            padding: 9px 17px;

            border-radius: 6px;

            text-decoration: none;

            color: #f5f5f5;

            border: 1px solid #292e38;

            background: #151820;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .button:hover {
            background: #1d212b;
            border-color: #3b414d;

            transform: translateY(-1px);
        }

        .button-primary {
            background: #e50914;
            border-color: #e50914;
        }

        .button-primary:hover {
            background: #f11a24;
            border-color: #f11a24;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: min(1200px, 90%);

            margin: 0 auto;

            padding: 60px 0;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 46px;

            margin-bottom: 10px;

            color: #f5f5f5;
        }

        .page-header h1::after {
            content: "";

            display: block;

            width: 60px;
            height: 3px;

            margin-top: 14px;

            background: #e50914;

            border-radius: 2px;

            box-shadow:
                0 0 12px rgba(229, 9, 20, 0.35);
        }

        .page-header p {
            color: #9ca3af;

            font-size: 18px;

            margin-top: 20px;
        }

        /* =========================
           MOVIE GRID
        ========================= */

        .movies-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fill, minmax(220px, 1fr));

            gap: 24px;
        }

        /* =========================
           MOVIE CARD
        ========================= */

        .movie-card {
            display: block;

            overflow: hidden;

            border: 1px solid #292e38;

            border-radius: 10px;

            background: #151820;

            text-decoration: none;

            color: inherit;

            transition:
                transform 0.2s ease,
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .movie-card:hover {
            transform: translateY(-5px);

            border-color: #e50914;

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.4),
                0 0 18px rgba(229, 9, 20, 0.08);
        }

        /* =========================
           POSTER
        ========================= */

        .movie-poster {
            height: 300px;

            display: flex;

            align-items: center;
            justify-content: center;

            position: relative;

            background:
                radial-gradient(circle at 50% 35%,
                    #3a1a1f 0%,
                    #21151a 35%,
                    #11141b 80%);

            color: #6b7280;

            font-size: 48px;

            overflow: hidden;
        }

        .movie-poster::after {
            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(to top,
                    rgba(11, 13, 18, 0.7),
                    transparent 55%);
        }

        .movie-poster span {
            position: relative;
            z-index: 1;
        }

        /* =========================
           MOVIE INFO
        ========================= */

        .movie-info {
            padding: 18px;
        }

        .movie-title {
            font-size: 20px;

            font-weight: bold;

            margin-bottom: 8px;

            color: #f5f5f5;
        }

        .movie-description {
            color: #9ca3af;

            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 15px;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

            overflow: hidden;
        }

        .movie-details {
            display: flex;

            justify-content: space-between;

            align-items: center;

            color: #6b7280;

            font-size: 14px;

            padding-top: 12px;

            border-top: 1px solid #252a35;
        }

        .rating {
            color: #f5c518;

            font-weight: bold;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            .navbar {
                padding: 18px 20px;
            }

            .logo {
                font-size: 20px;
            }

            .nav-links {
                gap: 6px;
            }

            .welcome {
                display: none;
            }

            .container {
                padding: 40px 0;
            }

            .page-header h1 {
                font-size: 36px;
            }

            .movies-grid {
                grid-template-columns:
                    repeat(2, 1fr);

                gap: 15px;
            }

            .movie-poster {
                height: 220px;
            }

            .movie-info {
                padding: 14px;
            }

            .movie-title {
                font-size: 17px;
            }

            .movie-description {
                font-size: 13px;
            }
        }

        @media (max-width: 450px) {

            .movies-grid {
                grid-template-columns: 1fr;
            }

            .movie-poster {
                height: 300px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <a href="/" class="logo">
            <span>🎬</span>
            Movie Browser
        </a>

        <div class="nav-links">

            <?php if ($user): ?>

                <span class="welcome">
                    Welcome,
                    <span class="username">
                        <?= h($user['username']) ?>
                    </span>
                </span>

                <a href="/profile" class="button">
                    Profile
                </a>

                <a href="/logout" class="button button-primary">
                    Log out
                </a>

            <?php else: ?>

                <a href="/login" class="button">
                    Log in
                </a>

                <a href="/register" class="button button-primary">
                    Sign up
                </a>

            <?php endif; ?>

        </div>

    </nav>

    <main class="container">

        <header class="page-header">

            <h1>
                Movies
            </h1>

            <p>
                Explore movies and find something worth watching.
            </p>

        </header>

        <section class="movies-grid">

            <?php foreach ($movies as $movie): ?>

                <a
                    href="/movies/<?= h($movie->id) ?>"
                    class="movie-card">

                    <div class="movie-poster">
                        <span>🎬</span>
                    </div>

                    <div class="movie-info">

                        <h2 class="movie-title">
                            <?= h($movie->title) ?>
                        </h2>

                        <p class="movie-description">
                            <?= h(
                                $movie->description
                                    ?? 'No description available.'
                            ) ?>
                        </p>

                        <div class="movie-details">

                            <span>
                                <?= h($movie->year ?? '') ?>
                            </span>

                            <span class="rating">
                                ★
                                <?= $movie->rating !== null ? h($movie->rating) : '-' ?>
                            </span>

                        </div>

                    </div>

                </a>

            <?php endforeach; ?>

        </section>

    </main>

</body>

</html>