<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $projectName = $_POST['title'];
    $jsoncode = $_POST['jsoncode'];

    include '../api/verifyPassword.php';

    $data = array();
    $sql = "SELECT jsoncode FROM code WHERE idproject IN (SELECT projectid FROM project WHERE title='{$projectName}' AND ownerid IN (SELECT userid FROM users WHERE email='{$email}'))";
    $table_data = $mysql->query($sql);

    while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
        $data[] = $row;
    }

    if(count($data)>0){
        //need to update
        $sql = "UPDATE code SET jsoncode='{$jsoncode}' WHERE idproject IN (SELECT projectid FROM project WHERE title='{$projectName}' AND ownerid IN (SELECT userid FROM users WHERE email='{$email}'))";
        if($mysql->query($sql)){
            $responce["MESSAGE"] = "CODE UPDATED SUCESFULLY";
            $responce["STATUS"] = 200;
        }else{
            $responce["MESSAGE"] = "QUERRY ERROR";
            $responce["STATUS"] = 400;
        }
    }
    else{
            $responce["MESSAGE"] = "QUERRY ERROR";
            $responce["STATUS"] = 400;
    }
    }
    echo json_encode($responce);
?>
