<?php


    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');


    if(strlen($password) < 8) {
        echo 'Password should be at least 8 characters';
    }
    if (empty($firstName)){
        echo 'First name is empty'; }
    if (empty($lastName)){
        echo 'Last name is empty'; }
    if (empty($birthday)){
        echo 'Birthday is empty'; }
    if (empty($email)){
        echo 'Email is empty'; }
    if (strpos($email, '@') == false ) {
        echo 'Email must contain an @ character';
      }


?>

<html>
<body>
<head>
    <h2>Display Registration Inputs</h2>
    <div>
        <?php echo "Registration is complete <br>"; ?>
    </div>
    <div>
        First Name: <?php echo $firstName; ?>
    </div>
    <div>
        Last Name: <?php echo $lastName; ?>
    </div>
    <div>
        Birtdhay: <?php echo $birthday; ?>
    </div>
    <div>
        Email: <?php echo $email; ?>
    </div>
    <div>
        Password: <?php echo $password; ?>
    </div>

    <a href="login.html">Go back to login</a>
</head>
</body>
</html>
