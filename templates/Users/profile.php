<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= h($user->username) ?> | Movie Browser</title>

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
        .review-card {
            display: grid;

            grid-template-columns: 120px 1fr;

            gap: 20px;

            padding: 20px;

            background: #151820;

            border: 1px solid #292e38;

            border-radius: 10px;

            color: inherit;
            text-decoration: none;

            transition:
                transform 0.2s ease,
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

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
            width: min(1000px, 90%);

            margin: 0 auto;

            padding: 60px 0;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            margin-bottom: 35px;
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
           PROFILE CARD
        ========================= */

        .profile-card {
            display: flex;
            align-items: center;

            gap: 25px;

            padding: 28px;

            margin-bottom: 45px;

            background: #151820;

            border: 1px solid #292e38;

            border-radius: 10px;

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.25);
        }

        .profile-avatar {
            width: 85px;
            height: 85px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 50%;

            background:
                radial-gradient(circle at 50% 30%,
                    #3a1a1f,
                    #1b151a);

            border: 1px solid #3b414d;

            font-size: 38px;
        }

        .profile-info h2 {
            font-size: 28px;

            margin-bottom: 8px;
        }

        .profile-info p {
            color: #9ca3af;

            font-size: 15px;
        }

        /* =========================
           SECTION HEADER
        ========================= */

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 28px;
        }

        .review-count {
            color: #6b7280;

            font-size: 14px;
        }

        /* =========================
           REVIEWS
        ========================= */

        .reviews {
            display: flex;
            flex-direction: column;

            gap: 18px;
        }

        .review-card {
            display: grid;

            grid-template-columns: 120px 1fr;

            gap: 20px;

            padding: 20px;

            background: #151820;

            border: 1px solid #292e38;

            border-radius: 10px;

            transition:
                transform 0.2s ease,
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .review-card:hover {
            transform: translateY(-3px);

            border-color: #e50914;

            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.35);
        }

        /* =========================
           MOVIE POSTER
        ========================= */

        .review-poster {
            height: 165px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background:
                radial-gradient(circle at 50% 35%,
                    #3a1a1f 0%,
                    #21151a 35%,
                    #11141b 80%);

            border: 1px solid #292e38;

            font-size: 35px;

            overflow: hidden;
        }

        /* =========================
           REVIEW CONTENT
        ========================= */

        .review-content {
            display: flex;
            flex-direction: column;
        }

        .review-title {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            gap: 15px;

            margin-bottom: 8px;
        }

        .review-title h3 {
            font-size: 22px;
        }

        .rating {
            color: #f5c518;

            font-weight: bold;

            white-space: nowrap;
        }

        .review-text {
            color: #9ca3af;

            line-height: 1.6;

            font-size: 15px;

            margin-top: 8px;
        }

        .review-meta {
            margin-top: auto;

            padding-top: 15px;

            color: #6b7280;

            font-size: 13px;

            border-top: 1px solid #252a35;
        }

        /* =========================
           EMPTY REVIEWS
        ========================= */

        .empty-reviews {
            padding: 45px 25px;

            text-align: center;

            background: #151820;

            border: 1px solid #292e38;

            border-radius: 10px;
        }

        .empty-reviews .icon {
            font-size: 40px;

            margin-bottom: 15px;
        }

        .empty-reviews h3 {
            font-size: 21px;

            margin-bottom: 8px;
        }

        .empty-reviews p {
            color: #9ca3af;

            font-size: 15px;
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

            .container {
                padding: 40px 0;
            }

            .page-header h1 {
                font-size: 36px;
            }

            .profile-card {
                padding: 20px;
            }

            .review-card {
                grid-template-columns: 1fr;
            }

            .review-poster {
                height: 220px;
            }

            .review-title {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <a href="/" class="logo">
            <span>🎬</span>
            Movie Browser
        </a>

        <div class="nav-links">

            <a href="/movies" class="button">
                Movies
            </a>

            <a href="/logout" class="button button-primary">
                Log out
            </a>

        </div>

    </nav>


    <!-- =========================
         MAIN
    ========================= -->

    <main class="container">

        <header class="page-header">

            <h1>
                Profile
            </h1>

            <p>
                Your movie activity and reviews.
            </p>

        </header>


        <!-- =========================
             USER PROFILE
        ========================= -->

        <section class="profile-card">

            <div class="profile-avatar">
                👤
            </div>

            <div class="profile-info">

                <h2>
                    <?= h($user->username) ?>
                </h2>

                <p>
                    Movie Browser member
                </p>

            </div>

        </section>


        <!-- =========================
             REVIEWS
        ========================= -->

        <section>

            <div class="section-header">

                <h2>
                    Your Reviews
                </h2>

                <span class="review-count">
                    <?= count($reviews) ?>
                    <?= count($reviews) === 1 ? 'review' : 'reviews' ?>
                </span>

            </div>


            <?php if (count($reviews) > 0): ?>

                <div class="reviews">

                    <?php foreach ($reviews as $review): ?>

                        <a
                            href="/movies/<?= h($review->movie->id) ?>"
                            class="review-card">

                            <div class="review-poster">
                                🎬
                            </div>


                            <div class="review-content">

                                <div class="review-title">

                                    <h3>
                                        <?= h(
                                            $review->movie->title
                                                ?? 'Unknown movie'
                                        ) ?>
                                    </h3>

                                    <span class="rating">
                                        ★
                                        <?= h($review->rating) ?>
                                    </span>

                                </div>


                                <p class="review-text">

                                    <?= h(
                                        $review->description
                                            ?? 'No review text.'
                                    ) ?>

                                </p>


                                <div class="review-meta">

                                    <?= h(
                                        $review->movie->release_year
                                            ?? ''
                                    ) ?>

                                </div>

                            </div>
                        </a>


                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="empty-reviews">

                    <div class="icon">
                        🎬
                    </div>

                    <h3>
                        No reviews yet
                    </h3>

                    <p>
                        You haven't reviewed any movies yet.
                    </p>

                </div>

            <?php endif; ?>

        </section>

    </main>

</body>

</html>