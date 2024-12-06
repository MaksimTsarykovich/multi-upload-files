<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://happyhaha.github.io/css/dist/style.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <style>

    </style>
</head>
<body>
<div class="login-container">
    <h1>Вход</h1>
    <form action="../includes/login_user.php" method="post">
        <?php if (isset($_SESSION['ValidationError'])) {
            echo '<div class=" mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
     role="alert">' . $_SESSION['ValidationError'] . '</div>';
            unset($_SESSION['ValidationError']);
        }
        ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Введите ваш email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Введите ваш пароль"
                   required>
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