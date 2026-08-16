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
                radial-gradient(circle at 50% 0%,
                    #252525 0%,
                    #111111 40%,
                    #070707 80%);
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
                linear-gradient(145deg,
                    #383838,
                    #171717);
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
            width: 100%;
            max-width: 600px;
        }

        .rating-title {
            color: #bcbcbc;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .stars {
            display: flex;
            gap: 3px;
            flex-wrap: wrap;
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

        .review-input {
            display: block;
            width: 100%;
            min-height: 100px;
            margin-top: 20px;
            padding: 12px;
            resize: vertical;

            color: #f5f5f5;
            background: #0d0d0d;
            border: 1px solid #303030;
            border-radius: 6px;

            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .movie-rating {
            font-size: 22px;
            color: #d4a62a;
            font-weight: normal;
            margin-left: 12px;
            white-space: nowrap;
        }

        .review-input:focus {
            outline: none;
            border-color: #555555;
        }

        .review-submit {
            display: inline-block;
            margin-top: 15px;
            cursor: pointer;
        }

        .reviews {
            margin-top: 40px;
            padding: 35px;
            background: rgba(16, 16, 16, 0.95);
            border: 1px solid #303030;
            border-radius: 12px;
        }

        .reviews-title {
            font-size: 28px;
            margin-bottom: 25px;
        }

        .reviews-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .review {
            padding: 20px;
            background: #141414;
            border: 1px solid #303030;
            border-radius: 8px;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .review-user {
            color: #eeeeee;
        }

        .review-rating {
            color: #f5f5f5;
            font-weight: bold;
        }

        .review-description {
            color: #b5b5b5;
            line-height: 1.6;
        }

        .no-reviews {
            color: #888888;
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

                    <span class="movie-rating">
                        ⭐ <?= $movie->rating !== null ? h($movie->rating) : '-' ?>
                    </span>
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

                <?php if ($user): ?>

                    <div class="rating-box">

                        <div class="rating-title">
                            Rate this movie
                        </div>

                        <?= $this->Form->create(null, [
                            'url' => [
                                'controller' => 'Movies',
                                'action' => 'review',
                                $movie->id,
                            ],
                            'method' => 'post',
                            'id' => 'review-form',
                        ]) ?>

                        <div class="stars" id="stars">

                            <?php for ($i = 1; $i <= 10; $i++): ?>

                                <button
                                    type="button"
                                    class="star"
                                    data-rating="<?= $i ?>">★</button>

                            <?php endfor; ?>

                        </div>

                        <div class="rating-value" id="rating-value">
                            No rating selected
                        </div>

                        <textarea
                            name="description"
                            id="review-description"
                            class="review-input"
                            placeholder="Write your review..."
                            required></textarea>

                        <input
                            type="hidden"
                            name="rating"
                            id="rating-input"
                            value="0">

                        <button
                            type="submit"
                            class="button button-primary review-submit">
                            Submit review
                        </button>

                        <?= $this->Form->end() ?>

                    </div>

                <?php endif; ?>

            </div>

        </section>

        <section class="reviews">

            <h2 class="reviews-title">
                Reviews
            </h2>

            <?php if ($reviews->isEmpty()): ?>

                <p class="no-reviews">
                    No reviews yet.
                </p>

            <?php else: ?>

                <div class="reviews-list">

                    <?php foreach ($reviews as $review): ?>

                        <article class="review">

                            <div class="review-header">

                                <strong class="review-user">
                                    <?= h($review->user->username) ?>
                                </strong>

                                <span class="review-rating">
                                    ⭐ <?= h($review->rating) ?>
                                </span>

                            </div>

                            <p class="review-description">
                                <?= h($review->description) ?>
                            </p>

                        </article>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </section>

    </main>

    <script>
        const stars = document.querySelectorAll('.star');
        const ratingValue = document.getElementById('rating-value');
        const ratingInput = document.getElementById('rating-input');
        const reviewForm = document.getElementById('review-form');

        let selectedRating = 0;

        stars.forEach((star) => {

            star.addEventListener('click', () => {

                selectedRating = Number(star.dataset.rating);

                ratingInput.value = selectedRating;

                stars.forEach((item) => {

                    const rating = Number(item.dataset.rating);

                    item.classList.toggle(
                        'active',
                        rating <= selectedRating
                    );

                });

                ratingValue.textContent =
                    `Your rating: ${selectedRating}/10`;

            });

        });

        if (reviewForm) {

            reviewForm.addEventListener('submit', (event) => {

                if (selectedRating === 0) {

                    event.preventDefault();

                    alert('Please select a rating.');

                }

            });

        }
    </script>

</body>

</html>