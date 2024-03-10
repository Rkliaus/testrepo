<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Регистрация</h1>
        <p>Пожалуйста, заполните эту форму, чтобы создать учетную запись.</p>
        <form action="process_registration.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Повторите пароль:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <label for="random_posting">Напишите ерунду на русской раскладке:</label>
            <input type="text" id="random_posting" name="random_posting">
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>