<?php

require('pdo.php');

    //defining the question variables
    $questionOfChoice = filter_input(INPUT_POST, 'questionOfChoice');
    $questionBody = filter_input(INPUT_POST, 'questionBody');
    $questionBody = htmlspecialchars($questionBody);
    $questionSkills = filter_input(INPUT_POST, 'questionSkills');
    $ownerid = filter_input(INPUT_POST, 'ownerid');
    $questionSkillArr = explode(',', $questionSkills);


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

function get_users_questions ($userId) {
    global $db;

    $query ='SELECT * FROM questions WHERE ownerid = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

global $db;

$query = 'INSERT INTO questions
                (title, body, skills, ownerid)
              VALUES
                (:title, :body, :skills, :ownerid)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $questionOfChoice);
    $statement->bindValue(':body', $questionBody);
    $statement->bindValue(':skills', $questionSkills);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    $statement->closeCursor();

?>

<html>
<head><title>Display Registration Information</title></head>
<body>

    <h2>First Name</h2>

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

    <div type="text-align: center"><a href="questionform.php">Add New Question</div>

</body>
</html>
