<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= h($movie->title) ?> | Movie Browser</title>

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
                    #252525 0%,
                    #111111 40%,
                    #070707 80%
                );
            color: #f5f5f5;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 60px;
            background: rgba(8, 8, 8, 0.92);
            border-bottom: 1px solid #2d2d2d;
            backdrop-filter: blur(8px);
        }

        .logo {
            color: #f1f1f1;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .logo span {
            color: #d4a62a;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .welcome {
            display: flex;
            align-items: center;
            color: #a7a7a7;
            padding: 9px 5px;
            font-size: 14px;
        }

        .username {
            color: #eeeeee;
            font-weight: bold;
            margin-left: 4px;
        }

        .button {
            padding: 9px 17px;
            border-radius: 6px;
            text-decoration: none;
            color: #e5e5e5;
            border: 1px solid #3a3a3a;
            background: rgba(35, 35, 35, 0.8);
            transition: 0.2s ease;
        }

        .button:hover {
            background: #303030;
            border-color: #5a5a5a;
        }

        .button-primary {
            background: #8f1d1d;
            border-color: #b52b2b;
        }

        .button-primary:hover {
            background: #aa2525;
            border-color: #d13a3a;
        }

        .container {
            width: min(1100px, 90%);
            margin: 0 auto;
            padding: 60px 0;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 30px;
            color: #999999;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .back-link:hover {
            color: #d4a62a;
        }

        .movie {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 50px;
            padding: 35px;
            background: rgba(16, 16, 16, 0.95);
            border: 1px solid #303030;
            border-radius: 12px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.45);
        }

        .poster {
            height: 430px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background:
                linear-gradient(
                    145deg,
                    #383838,
                    #171717
                );
            border: 1px solid #3d3d3d;
            color: #777777;
            font-size: 70px;
        }

        .movie-content {
            padding-top: 10px;
        }

        .movie-title {
            font-size: 48px;
            margin-bottom: 14px;
            color: #f5f5f5;
            line-height: 1.1;
        }

        .movie-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 28px;
            color: #999999;
            font-size: 15px;
        }

        .movie-meta span {
            position: relative;
        }

        .movie-meta span:not(:last-child)::after {
            content: "•";
            position: absolute;
            right: -13px;
            color: #555555;
        }

        .description {
            color: #b5b5b5;
            font-size: 17px;
            line-height: 1.7;
            max-width: 700px;
            margin-bottom: 35px;
        }

        .rating-box {
            padding: 22px;
            border: 1px solid #303030;
            border-radius: 10px;
            background: #141414;
            width: fit-content;
        }

        .rating-title {
            color: #bcbcbc;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .stars {
            display: flex;
            gap: 3px;
        }

        .star {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 34px;
            color: #414141;
            transition:
                color 0.15s ease,
                transform 0.15s ease;
            padding: 0;
        }

        .star:hover {
            transform: scale(1.15);
        }

        .star.active {
            color: #d4a62a;
        }

        .rating-value {
            margin-top: 10px;
            color: #888888;
            font-size: 14px;
        }

        @media (max-width: 800px) {

            .navbar {
                padding: 20px;
            }

            .movie {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .poster {
                height: 400px;
            }

            .movie-title {
                font-size: 38px;
            }
        }

        @media (max-width: 600px) {

            .nav-links {
                gap: 6px;
            }

            .welcome {
                display: none;
            }

            .container {
                padding: 40px 0;
            }
        }

        @media (max-width: 500px) {

            .movie {
                padding: 20px;
            }

            .poster {
                height: 330px;
            }

            .movie-title {
                font-size: 32px;
            }

            .movie-meta {
                flex-wrap: wrap;
                gap: 12px;
            }

            .star {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <a href="/" class="logo">
        <span>🎬</span> Movie Browser
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

    <a href="/movies" class="back-link">
        ← Back to movies
    </a>

    <section class="movie">

        <div class="poster">
            🎬
        </div>

        <div class="movie-content">

            <h1 class="movie-title">
                <?= h($movie->title) ?>
            </h1>

            <div class="movie-meta">

                <?php if (!empty($movie->year)): ?>
                    <span><?= h($movie->year) ?></span>
                <?php endif; ?>

                <?php if (!empty($movie->genre)): ?>
                    <span><?= h($movie->genre) ?></span>
                <?php endif; ?>

                <?php if (!empty($movie->duration)): ?>
                    <span><?= h($movie->duration) ?> min</span>
                <?php endif; ?>

            </div>

            <p class="description">
                <?= h($movie->description ?? 'No description available.') ?>
            </p>

            <div class="rating-box">

                <div class="rating-title">
                    Rate this movie
                </div>

                <div class="stars" id="stars">

                    <button class="star" data-rating="1">★</button>
                    <button class="star" data-rating="2">★</button>
                    <button class="star" data-rating="3">★</button>
                    <button class="star" data-rating="4">★</button>
                    <button class="star" data-rating="5">★</button>
                    <button class="star" data-rating="6">★</button>
                    <button class="star" data-rating="7">★</button>
                    <button class="star" data-rating="8">★</button>
                    <button class="star" data-rating="9">★</button>
                    <button class="star" data-rating="10">★</button>

                </div>

                <div class="rating-value" id="rating-value">
                    No rating selected
                </div>

            </div>

        </div>

    </section>

</main>

<script>
    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('rating-value');

    let selectedRating = 0;

    stars.forEach((star) => {

        star.addEventListener('click', () => {

            selectedRating = Number(star.dataset.rating);

            stars.forEach((item) => {

                const rating = Number(item.dataset.rating);

                item.classList.toggle(
                    'active',
                    rating <= selectedRating
                );

            });

            ratingValue.textContent =
                `Your rating: ${selectedRating}/10`;

            /*
             * Later:
             *
             * fetch('/api/movies/<?= h($movie->id) ?>/rating', {
             *     method: 'POST',
             *     body: JSON.stringify({
             *         rating: selectedRating
             *     })
             * });
             */
        });

    });
</script>

</body>
</html>
