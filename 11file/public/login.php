<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .login-container .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h1>Вход</h1>
    <form action="/login" method="POST">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Введите ваш email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Введите ваш пароль" required>
        </div>

        <div class="mb-3 text-end">
            <a href="/forgot-password" class="text-muted">Забыли пароль?</a>
        </div>

        <button type="submit" class="btn btn-primary w-100">Войти</button>

        <div class="text-center mt-3">
            <p class="mb-0">Нет аккаунта? <a href="register.php" class="text-primary">Зарегистрироваться</a></p>
        </div>
    </form>
</div>

<!-- Подключение Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>