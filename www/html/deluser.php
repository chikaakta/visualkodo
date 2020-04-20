<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';


    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../api/verifyPassword.php';

    //delete all project in code table
    $sql = "DELETE FROM code WHERE idproject IN (SELECT projectid FROM project WHERE ownerid IN (SELECT userid FROM users WHERE email='{$email}'))";

    if($mysql->query($sql)){
        //remove projects
        $sql = "DELETE FROM project WHERE ownerid IN (SELECT userid FROM users WHERE email='{$email}')";

        if($mysql->query($sql)){

            //remove users

            $sql = "DELETE FROM users WHERE email='{$email}'";

            if($mysql->query($sql)){

                $responce["MESSAGE"] = "ACCOUNT AND PROJECTS REMOVED";
                $responce["STATUS"] = 200;
            }else{
                $responce["MESSAGE"] = "QUERRY ERROR PROJECTS DELETED BUT NOT ACOUNT";
                $responce["STATUS"] = 400;
            }
        }

        else{
            $responce["MESSAGE"] = "QUERRY ERROR CODE REMOVED BUT NOT THE ACOUNT";
            $responce["STATUS"] = 400;
        }

    }else{
        $responce["MESSAGE"] = "QUERRY ERROR";
        $responce["STATUS"] = 400;
    }

    echo json_encode($responce);
?>
