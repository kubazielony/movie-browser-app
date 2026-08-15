<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Log in | Movie Browser</title>

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
                    circle at 50% 15%,
                    #3a2528 0%,
                    #1c1719 30%,
                    #0d0d0f 65%,
                    #080809 100%
                );
            color: #f4f1ed;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: -200px;
            left: 50%;
            transform: translateX(-50%);
            width: 650px;
            height: 650px;
            background: rgba(150, 35, 45, 0.08);
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 60px;
            background: rgba(8, 8, 10, 0.92);
            border-bottom: 1px solid #30292a;
            position: relative;
            z-index: 2;
        }

        .logo {
            color: #f1ece7;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .logo span {
            color: #b63b46;
        }

        .nav-link {
            color: #a9a3a0;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .nav-link:hover {
            color: #f0e7e3;
        }

        .container {
            min-height: calc(100vh - 75px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 20px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            padding: 42px;
            background: rgba(17, 16, 18, 0.96);
            border: 1px solid #383133;
            border-radius: 12px;
            box-shadow:
                0 25px 80px rgba(0, 0, 0, 0.6),
                0 0 40px rgba(130, 30, 40, 0.06);
        }

        .icon {
            text-align: center;
            font-size: 42px;
            margin-bottom: 15px;
        }

        .login-card h1 {
            text-align: center;
            font-size: 34px;
            margin-bottom: 10px;
            color: #f5f1ed;
        }

        .subtitle {
            text-align: center;
            color: #999293;
            margin-bottom: 30px;
        }

        .cinema-line {
            width: 80px;
            height: 2px;
            background: #a93643;
            margin: 0 auto 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #c8c0be;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 14px;
            border-radius: 6px;
            border: 1px solid #403a3c;
            background: #111012;
            color: #f4f1ed;
            font-size: 15px;
            outline: none;
            transition: 0.2s ease;
        }

        .form-group input::placeholder {
            color: #666164;
        }

        .form-group input:focus {
            border-color: #a93643;
            box-shadow: 0 0 0 2px rgba(169, 54, 67, 0.14);
        }

        .form-button {
            width: 100%;
            padding: 13px;
            margin-top: 5px;
            border: 1px solid #b44350;
            border-radius: 6px;
            background: #8e303b;
            color: #fff7f4;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .form-button:hover {
            background: #a83a47;
            border-color: #c34b57;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #858082;
            font-size: 14px;
        }

        .register-link a {
            color: #c65a65;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #e07882;
        }

        .error-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 6px;
            background: rgba(130, 35, 45, 0.18);
            border: 1px solid #69343b;
            color: #dba4a9;
            font-size: 14px;
            text-align: center;
        }

        .flash-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 6px;
            background: rgba(130, 35, 45, 0.18);
            border: 1px solid #69343b;
            color: #dba4a9;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 20px;
            }

            .login-card {
                padding: 30px 25px;
            }

            .login-card h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <a href="/" class="logo">
        <span>🎬</span> Movie Browser
    </a>

    <a href="/" class="nav-link">
        Back to home
    </a>

</nav>

<main class="container">

    <section class="login-card">

        <div class="icon">
            🎬
        </div>

        <div class="cinema-line"></div>

        <h1>Welcome Back</h1>

        <p class="subtitle">
            Log in to continue exploring movies.
        </p>

        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null, [
            'type' => 'post',
        ]) ?>

        <div class="form-group">
            <?= $this->Form->control('username', [
                'label' => 'Username',
                'required' => true,
                'autocomplete' => 'username',
            ]) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->control('password', [
                'label' => 'Password',
                'type' => 'password',
                'required' => true,
                'autocomplete' => 'current-password',
            ]) ?>
        </div>

        <?= $this->Form->button('Log in', [
            'class' => 'form-button',
        ]) ?>

        <?= $this->Form->end() ?>

        <p class="register-link">
            Don't have an account?
            <a href="/register">Create one</a>
        </p>

    </section>

</main>

</body>
</html>
