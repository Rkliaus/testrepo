<?php
// 1.

$email = $_POST['email'];
$password = $_POST['password'];
$random_posting = $_POST['random_posting'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    while (true) {
        if ($password !== $confirmPassword) {
            echo "Пароли не совпадают. Пожалуйста, повторите ввод.";
            exit;
        } else {
            if (!empty($email) && !empty($password)) {
                $user_id = uniqid();
                $data = "$email:$password:$user_id\n"; 
                file_put_contents('users.txt', $data, FILE_APPEND); 
                echo 'Регистрация успешно завершена!';
            } else {
                echo 'Заполните все поля формы.';
            }
            break;
        }
    }     
}

// 2.
$file = fopen('random_numbers.txt', 'w');
for ($i = 0; $i < 10; $i++) {
    $random_number = mt_rand(0, 10);
    fwrite($file, "$random_number\n");
}
fclose($file);
function count_occurrences($user_number) {
    $file_contents = file_get_contents('random_numbers.txt');
    $numbers = explode("\n", $file_contents);
    $occurrences = array_count_values($numbers);
    return $occurrences[$user_number] ?? 0;
}
$result = count_occurrences($random_posting);
echo "Число $random_posting встречается $result раз в файле.";
// 3.

$directory = '.';
$files = scandir($directory);
$fileCount = count($files) - 2; 
$folderCount = 0;

foreach ($files as $file) {
    if (is_dir($directory . '/' . $file)) {
        $folderCount++;
    }
}
echo "Files: $fileCount\n";
echo "Folders: $folderCount\n";


// 4.
function rus2latin($string) {
    $converter = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
        'Е' => 'E', 'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
        'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
        'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch',
        'Ш' => 'Sh', 'Щ' => 'Sch', 'Ь' => '', 'Ы' => 'Y', 'Ъ' => '',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    );
    return strtr($string, $converter);
}
echo rus2latin($random_posting) . "<br><hr>";

// 5.
session_start();    
$file_contents = file_get_contents('users.txt');
$users_data = explode(':',$file_contents);

if (isset($users_data[0]) && isset($users_data[2])) {
    $_SESSION['email'] = $users_data[0];
    $_SESSION['user_id'] = $users_data[2];
}

if (isset($_SESSION['email']) && isset($_SESSION['user_id'])) {
    echo "Welcome fellow traveler, your magic letterbox is " . $_SESSION['email'] . "?<br><hr>";
    echo "YOUR UNIC ID: " . $_SESSION['user_id'];
} 