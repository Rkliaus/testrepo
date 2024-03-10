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

<?php  
class FactorialCalculator {
    public $number;
    public function __construct($number) {
        $this->number = $number;
    }
    public function calculateFactorial() {
        if ($this->number < 0) {
            return "UNDEFINED";
        }
        $result = 1;
        for ($i = 1; $i <= $this->number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}
$number = 11;
$factorialCalculator = new FactorialCalculator($number);
echo "$number: " . $factorialCalculator->calculateFactorial();
echo "<br><hr>";


class Calculate {
    private $historyDump = 'history.txt';
    private $history = [];

    public function addition($x, $y) {
        $result = $x + $y;
        $this->addToHistory("Addition: $x + $y = $result");
        return $result;
    }

    public function subtraction($x, $y) {
        $result = $x - $y;
        $this->addToHistory("Subtraction: $x - $y = $result");
        return $result;
    }

    public function division($x, $y) {
        if ($y != 0) {
            $result = $x / $y;
            $this->addToHistory("Division: $x / $y = $result");
            return $result;
        } else {
            return "Error: Division by zero!";
        }
    }

    public function multiplication($x, $y) {
        $result = $x * $y;
        $this->addToHistory("Multiplication: $x * $y = $result");
        return $result;
    }

    private function addToHistory($entry) {
        $this->history[] = $entry;
        file_put_contents($this->historyDump, implode("\n", $this->history), FILE_APPEND);
    }
}
$calculator = new Calculate();
echo $calculator->addition(3, 5);
echo $calculator->division(12, 4); 
echo $calculator->multiplication(5, 123);

    class figure {
        protected $color;
        protected $texture;
        protected $material;

        public function __construct($material, $texture, $color) {
            $this->material = $material;
            $this->texture = $texture;
            $this->color = $color;
        }
        public function knowColor() {
            return $this->color;
        }
        public function knowTexture() {
            return $this->texture;
        }
        public function knowMaterial() {
            return $this->color;
        }
    }

    class circle extends figure {
        protected $radius;
        public function __construct($color, $material, $texture, $radius) {
            parent::__construct($material, $texture, $color);
            $this->radius = $radius;
        }
        public function circleSquare() {
            return pi() * $this->radius * $this->radius;
        }
    }

    class foursquare extends figure {
        protected $square;
        public function __construct( $square, $color, $material, $texture) {
            parent::__construct($material, $texture, $color);
            $this->square = $square;
    }
        public function foursquareSquare() {
            return $this->square * $this->square;
        }
    }
    // Используя задание №5 из прошлого дз выполните всё тоже самое (форма регистрации/авторизации и запись в файл) но с использованием классов (создайте класс User или Registration, методы для валидации).

    class User {
        private $email;
        private $password;
    
        public function __construct($email, $password) {
            $this->email = $email;
            $this->password = $password;
        }
    
        public function validateEmail() {
            // Проверка, что email содержит символ @
            return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
        }
    
        public function validatePassword() {
            // Проверка, что пароль содержит хотя бы одну цифру и один спец. символ
            return preg_match('/^(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/', $this->password);
        }
    
        public function saveToFile() {
            if ($this->validateEmail() && $this->validatePassword()) {
                $data = $this->email . ':' . $this->password . "\n";
                if (file_put_contents('user.txt', $data, FILE_APPEND) !== false) {
                    return true;
                }
            }
            return false;
        }
    }
    
    // Пример использования:
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new User($email, $password);
    
    if ($user->saveToFile()) {
        echo 'Регистрация успешно завершена!';
    } else {
        echo 'Ошибка при регистрации. Пожалуйста, проверьте введенные данные.';
    }
    ?>

    <div class="container">
        <h1>Регистрация</h1>
        <p>Пожалуйста, заполните эту форму, чтобы создать учетную запись.</p>
        <form action="index.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Повторите пароль:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
    </body>
</html>