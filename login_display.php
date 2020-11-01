<?php
        $emailErr = $passwordErr = '';
        $email = $password = '';
        session_start();
        if (empty($_POST["email"])) {
            $emailErr = "Please enter your E-mail";
        } else {
            $email = input_data($_POST["email"]);
            if (!filter_var("/([\w\-]+\[\w\-]+\.[\w\-]+)/",$email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Must contain an @ character";
            }
        }


        if (empty($_POST["password"]) && $_POST["password"] != ""){
           if (strlen($_POST["password"]) <= '8') {
               $passwordErr .="Your Password must at least be 8 characters."."<br>";
           } else {
               $passwordErr = "Input password ";
           }
        }
        function input_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

<html>
<head><title>Welcome</title></head>
<body>

    <h2>Question</h2>

</body>
</html>


