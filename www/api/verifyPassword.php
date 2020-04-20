<?php

    if( $_POST['email'] && $_POST['password']){

        $data = array();
        $sql = "SELECT password FROM users WHERE email='{$email}';";
        $table_data = $mysql->query($sql);

        while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }

        if(count($data) > 0){

            $pwd = $data[0]["password"];

            $varr = password_verify($password, $pwd);

            if(!password_verify($password, $pwd)){
                $responce["MESSAGE"] = "WRONG PASSWORD";
                $responce["STATUS"] = 401;
                echo json_encode($responce);
                exit();
            }
        }
        else{
            $responce["MESSAGE"] = "NO EMAIL FOUND";
            $responce["STATUS"] = 404;
            echo json_encode($responce);
            exit();
    }
    }
    else{
        $responce["MESSAGE"] = "INVALID REQUEST";
        $responce["STATUS"] = 400;
        echo json_encode($responce);
        exit();
    }
?>
