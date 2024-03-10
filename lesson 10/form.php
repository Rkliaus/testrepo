<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANKETA</title>
</head>
<body>
<!-- <?php
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';
?> -->

<?php 
	$email = $address = $birthdate = $phone = $sex = "";
	$emailErr = $phoneErr = $sexErr = $birthdateErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!preg_match('/^\+375(44|25|29)\d{7}$/', $phone)) {
                $phone = input($_POST["phone"]);} 
				else {
                $phoneErr = "Неверный формат номера телефона";
            }
                $address = input($_POST["address"]);

                // if (preg_match('/^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[012])\.(19|20)\d\d$/', $birthdate)) {
                    $birthdate = input($_POST["birthdate"]);
                //   } else {
                //     $birthdateErr = "Неверно введены данные, введите дату рождения через ."; 
                //   }
               

            if (empty($_POST["email"])) {
                $emailErr = "Email обязателен";
            } else {
                $email = input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Неверный формат email";
                }
            }
            if (empty($_POST["sex"])) {
                $sexErr = "Выберите пол";
            } else {
                $sex = input($_POST["sex"]);
                }
	}

    function input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


    $user_data = array(
		"phone" => $phone,
		"address" => $address,
		"birthdate" => $birthdate,
		"email" => $email,
		"sex" => $sex
	);

    function calculateAge($birthdate) {
		$today = new DateTime();
		$birthDate = new DateTime($birthdate);
		$age = $today->diff($birthDate)->y;
		return $age;
	}

	function divideAddress($addressString) {
		$addressArray = array(
			'country' => '',
			'city' => '',
			'street' => ''
		);
	
		$addressParts = explode(', ', $addressString);
		if (count($addressParts) >= 1) {
			$addressArray['country'] = $addressParts[0];
		}
		if (count($addressParts) >= 2) {
			$addressArray['city'] = $addressParts[1];
		}
		if (count($addressParts) >= 3) {
			$addressArray['street'] = $addressParts[2];
		}
	
		return $addressArray;
	}

	
	$user_birthdate = $user_data['birthdate']; 
	$user_age = calculateAge($user_birthdate);
	echo "Age: " . $user_age;

	echo "<br>";

	$user_address_string = $user_data['address'];
	$user_address_array = divideAddress($user_address_string);
	$newuser_data= array_merge($user_data, $user_address_array);
	print_r($newuser_data);
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="registration_form" method="post">  
            <input type="email" name="email" id="input_email" placeholder="Email" required>
                <span><?php echo $emailErr;?></span><br><hr>
            <input type="text" name="address" id="input_address" placeholder="Address" required> 
				<br><hr>
            <input type="date" name="birthdate" id="input_birthdate" placeholder="Birthdate" required> 
                <span><?php echo $birthdateErr;?></span><br><hr>
            <input type="text" name="phone" id="input_phone" placeholder="Phone" required>
                <span><?php echo $phoneErr;?></span><br><hr>
            <input type="radio" name="sex" id="input_sex" placeholder="Male" value="male">MALE
            <input type="radio" name="sex" id="input_sex" placeholder="Female" value="female">FEMALE
			<input type="radio" name="sex" id="input_sex" placeholder="wh40000" value="Xenos">XENOS
                <span><?php echo $sexErr;?></span><br><hr>
            <button type="submit" class="sendmessagebtn">Send Message</button> 
        </form>
</body>
</html>


