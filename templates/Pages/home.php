<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Movie Browser</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background:
                radial-gradient(
                    circle at 50% 0%,
                    #2a1014 0%,
                    #151820 35%,
                    #0b0d12 75%
                );
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

            background: rgba(11, 13, 18, 0.88);
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
            letter-spacing: 1px;
            text-decoration: none;
        }

        .logo span {
            color: #e50914;
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .welcome {
            color: #9ca3af;
            margin-right: 8px;
            font-size: 14px;
        }

        .username {
            color: #f5f5f5;
            font-weight: bold;
        }

        /* =========================
           BUTTONS
        ========================= */

        .button {
            display: inline-block;

            padding: 10px 18px;

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
            color: white;
        }

        .button-primary:hover {
            background: #f11a24;
            border-color: #f11a24;
        }

        .button-danger {
            background: #151820;
            border-color: #4b2529;
            color: #f08b91;
        }

        .button-danger:hover {
            background: #261417;
            border-color: #7a3036;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: calc(100vh - 75px);

            display: flex;
            justify-content: center;
            align-items: center;

            text-align: center;

            padding: 40px;

            position: relative;
            overflow: hidden;
        }

        /*
         * Cinematic glow
         */

        .hero::before {
            content: "";

            position: absolute;

            width: 600px;
            height: 600px;

            background: rgba(229, 9, 20, 0.08);

            border-radius: 50%;

            filter: blur(100px);

            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%);
        }

        /*
         * Subtle film-light effect
         */

        .hero::after {
            content: "";

            position: absolute;

            width: 900px;
            height: 300px;

            background: rgba(245, 197, 24, 0.035);

            filter: blur(100px);

            transform: rotate(-12deg);

            top: 25%;
            left: 50%;

            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;

            max-width: 900px;
        }

        /* =========================
           DECORATION
        ========================= */

        .cinema-line {
            width: 100px;
            height: 2px;

            background: #e50914;

            margin: 0 auto 28px;

            box-shadow:
                0 0 15px rgba(229, 9, 20, 0.5);
        }

        .cinema-icon {
            font-size: 54px;

            margin-bottom: 15px;

            filter:
                drop-shadow(0 5px 15px rgba(0, 0, 0, 0.5));
        }

        /* =========================
           HEADINGS
        ========================= */

        .hero h1 {
            font-size: 72px;

            margin-bottom: 20px;

            color: #f5f5f5;

            letter-spacing: 2px;

            text-shadow:
                0 5px 30px rgba(0, 0, 0, 0.7);
        }

        .hero h1 span {
            color: #e50914;
        }

        .hero p {
            font-size: 20px;

            color: #9ca3af;

            margin-bottom: 35px;
        }

        /* =========================
           HERO BUTTONS
        ========================= */

        .hero-buttons {
            display: flex;

            gap: 15px;

            justify-content: center;
        }

        /* =========================
           RATING DECORATION
        ========================= */

        .rating {
            margin-top: 25px;

            color: #f5c518;

            font-size: 18px;

            letter-spacing: 3px;
        }

        .rating-label {
            margin-top: 8px;

            color: #6b7280;

            font-size: 13px;

            letter-spacing: 1px;
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

            .hero {
                padding: 30px 20px;
            }

            .hero h1 {
                font-size: 48px;
                line-height: 1.1;
            }

            .hero p {
                font-size: 17px;
            }

            .hero-buttons {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }

            .hero-buttons .button {
                width: 100%;
            }

            .cinema-icon {
                font-size: 44px;
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

            <a href="/movies" class="button button-primary">
                Movies
            </a>

            <a href="/logout" class="button button-danger">
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

<main class="hero">

    <div class="hero-content">

        <div class="cinema-line"></div>

        <?php if ($user): ?>

            <div class="cinema-icon">
                🍿
            </div>

            <h1>
                Welcome back,
                <span><?= h($user['username']) ?></span>
            </h1>

            <p>
                Your next great movie is waiting.
            </p>

            <div class="hero-buttons">

                <a href="/movies" class="button button-primary">
                    Browse Movies
                </a>

            </div>

            <div class="rating">
                ★ ★ ★ ★ ★
            </div>

            <div class="rating-label">
                FIND SOMETHING WORTH WATCHING
            </div>

        <?php else: ?>

            <div class="cinema-icon">
                🎬
            </div>

            <h1>
                Movie <span>Browser</span>
            </h1>

            <p>
                Discover movies worth watching.
            </p>

            <div class="hero-buttons">

                <a href="/movies" class="button button-primary">
                    Browse Movies
                </a>

                <a href="/register" class="button">
                    Create an Account
                </a>

            </div>

            <div class="rating">
                ★ ★ ★ ★ ★
            </div>

            <div class="rating-label">
                YOUR NEXT FAVORITE MOVIE AWAITS
            </div>

        <?php endif; ?>

    </div>

</main>

</body>
</html>
