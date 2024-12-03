<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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

        .register-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .register-container .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="register-container">
    <h1>Регистрация</h1>
    <form action="../includes/register_user.php" method="post">
        <?php if (isset($_SESSION['ValidationError'])) {
            echo '<div class="w-[600px] mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
     role="alert">' . $_SESSION['ValidationError'] . '</div>';
            unset($_SESSION['ValidationError']);
        }
        ?>
        <!-- Поле для имени -->
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Введите ваше имя" required>
        </div>
        <!-- Поле для email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Введите ваш email" required>
        </div>
        <!-- Поле для пароля -->
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль" required>
        </div>
        <!-- Поле для подтверждения пароля -->
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Подтвердите пароль</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Повторите пароль" required>
        </div>
        <!-- Кнопка регистрации -->
        <input type="submit"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
               value="Отправить файл"/>
        <!-- Ссылка на вход -->
        <div class="text-center mt-3">
            <p class="mb-0">Уже есть аккаунт? <a href="login.php" class="text-primary">Войти</a></p>
        </div>
    </form>
</div>

<!-- Подключение Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>