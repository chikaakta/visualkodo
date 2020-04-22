<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $projectName = $_POST['title'];

    include '../api/verifyPassword.php';

    $data = array();
    $sql = "SELECT jsoncode FROM code WHERE idproject IN (SELECT projectid FROM project WHERE title='{$projectName}' AND ownerid IN (SELECT userid FROM users WHERE email='{$email}'))";
    $table_data = $mysql->query($sql);

    while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
        $data[] = $row;
    }

    if(count($data)>0){
        $responce["MESSAGE"] = utf8ize($data);
        $responce["STATUS"] = 200;
    }
    else{
        $data = array();
        $sql = "SELECT * FROM project WHERE ownerid IN (SELECT userid FROM users WHERE email='{$email}') AND title='{$projectName}'";
        $table_data = $mysql->query($sql);

        while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }
        if(count($data)>0){

        $responce["MESSAGE"] = "THIS PROJECT IS EMPTY";
        $responce["STATUS"] = 401;

        }else{
            $responce["MESSAGE"] = "PROJECT DO NOT EXIST";
            $responce["STATUS"] = 404;

        }
    }
    echo json_encode($responce);
?>