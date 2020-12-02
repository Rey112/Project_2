<?php

require('pdo.php');

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


function create_question ($title, $body, $skills, $ownerid)
{
    global $db;

    $query = 'INSERT INTO questions
                (title, body, skills, ownerid)
              VALUES
                (:title, :body, :skills, :ownerid)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    $statement->closeCursor();

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Questions</title>
    <link rel="stylesheet" type="text/css" href="question.css">
</head>

<body>
    <header>
    <form action="question.php" method="post">
        <h2>Questions</h2>
        <div>
            <label for="questionOfChoice">Question of Choice</label>
            <br><br>
            <input type="text" name="questionOfChoice" id="questionOfChoice">
            <br><br>
        </div>
        <div>
            <label for="questionBody">Body of Question</label>
            <br><br>
            <textarea name="questionBody" id="questionBody" rows="4" cols="50">
                Enter the question in the body provided.
            </textarea>
        </div>
        <div>
            <label for="questionSkills">Question Skills</label>
            <br><br>
            <input type="text" name="questionSkills" id="questionSkills">
        </div>

    <div type="text-align: center"><input type ="submit" value="Submit"></div>
    </form>
    </header>
</body>

</html>

