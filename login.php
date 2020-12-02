<?php

    require('pdo.php');

      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');

    if (strpos($email, '@') == false ) {
        echo 'Email must contain an @ character';
        echo '<br>';
    }

    if (empty($password)) {
            echo 'password is required';
    } elseif (strlen($password) <= 8){
        echo 'password must be 8 characters';
        echo "<br>";
    } else {
        echo 'password is valid';
        echo "<br>";
    }

    function input_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }

    $query = 'INSERT INTO accounts
                (email, password)
             VALUES
                (:email, :password)';

    global $db;
    $statement = $db->prepare($query);

    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);

?>

<html>
<head>
    <title>Display Login Information</title></head>
    <link rel="stylesheet" type="text/css" href="main.css">
<body>

    <h2>Login Inputs</h2>
    <div>
        Email: <?php echo $email; ?>
    </div>
    <div>
        Password: <?php echo $password; ?>
    </div>
    <div style="text-align: center"><a href="question.html">Click Next to go to Questions</a></div>
</body>
</html>



