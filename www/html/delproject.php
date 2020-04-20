<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';


    $email = $_POST['email'];
    $password = $_POST['password'];
    $title = $_POST['title'];

    include '../api/verifyPassword.php';

    //delete all project in code table
    $sql = "DELETE FROM code WHERE idproject IN (SELECT projectid FROM project WHERE title='{$title}' AND ownerid IN (SELECT userid FROM users WHERE email='{$email}'))";

    if($mysql->query($sql)){
        //remove projects
        $sql = "DELETE FROM project WHERE title='{$title}' AND ownerid IN (SELECT userid FROM users WHERE email='{$email}')";

        if($mysql->query($sql)){

            //remove users
            $responce["MESSAGE"] = "CODE AND PROJECT REMOVED";
            $responce["STATUS"] = 200;
        }

        else{
            $responce["MESSAGE"] = "QUERRY ERROR CODE REMOVED BUT NOT THE PROJECT";
            $responce["STATUS"] = 400;
        }

    }else{
        $responce["MESSAGE"] = "QUERRY ERROR";
        $responce["STATUS"] = 400;
    }

    echo json_encode($responce);
?>
