<?php

        include '../api/connexionPost.php';
        include '../api/utf8.php';

        $email = $_POST['email'];
        $password = $_POST['password'];
        $projectName = $_POST['title'];
        $ispublic = $_POST['public'];

        include '../api/verifyPassword.php';

        $data = array();
        $sql = "SELECT * FROM project WHERE title='{$projectName}' AND ownerid IN (SELECT userid FROM users WHERE email='{$email}')";
        $table_data = $mysql->query($sql);

        while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }
        if(count($data)>0){
            $responce["MESSAGE"] = "PROJECT ALREADY EXIST";
            $responce["STATUS"] = 401;
        }
        else{
            $data = array();
            $sql = "INSERT INTO project (title, public, ownerid) VALUES ('{$projectName}', '{$ispublic}', (SELECT userid FROM users WHERE email='{$email}'))";
            $table_data = $mysql->query($sql);

            $responce["MESSAGE"] = "PROJECT CREATED SUCCESFULLY";
            $responce["STATUS"] = 200;
        }
        echo json_encode($responce);
?>
