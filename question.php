<?php

    require('pdo.php');
    require('questions_db.php');

    //defining the question variables
    $questionOfChoice = filter_input(INPUT_POST, 'questionOfChoice');
    $questionBody = filter_input(INPUT_POST, 'questionBody');
    $questionBody = htmlspecialchars($questionBody);
    $questionSkills = filter_input(INPUT_POST, 'questionSkills');
    $questionSkills = explode(',', $questionSkills);



    if (strlen($questionOfChoice) < 1) {
        echo 'Input question of choice';
        echo"<br>";
    }
    elseif (strlen($questionOfChoice) < 3){
        echo ' Please enter name that is greater than 3 characters';
        echo"<br>";
    }

    if (strlen($questionBody) < 1) {
        echo 'Please enter your response that should be greater than 1 character and less than 500';
        echo"<br>";
    }
    elseif(strlen($questionBody) > 500){
        echo 'Please enter your response that should be greater than 1 character and less than 500';
        echo"<br>";
    }

    if(count($questionSkills) < 2){
        echo '2 skills must be entered';
        echo"<br>";
    }
    
?>

<html>
<head><title>Display Registration Information</title></head>
<body>

    <h2>Question Choice Input</h2>
    <div>
        Question Choice: <?php echo $questionOfChoice; ?>
    </div>

    <h2>Question Body Input</h2>
    <div>
        Question Body:<br>
        <?php echo $questionBody; ?>
    </div>

    <h2>Question Skills Input</h2>
    <div>
        Question Skills Array: <?php print_r($questionSkills); ?><br>
    </div>

    <div type="text-align: center"><input type ="submit" value="Add New Question"></div>

</body>
</html>
