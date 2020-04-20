<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';

    if( $_POST['username'] && $_POST['password'] && $_POST['email'] && $_POST['lastname'] && $_POST['firstname']){


        $data = array();
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $password = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE email='{$email}'";
        $table_data = $mysql->query($sql);

        while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }

        if(count($data) > 0){

            $responce["MESSAGE"] = "EMAIL ALREADY REGISTER ARE YOU BRITISH ?";
            $responce["STATUS"] = 418;
        }
        else{

            $sql = "INSERT INTO users(email,username,password,lastname,firstname) VALUES ('{$_POST['email']}','{$_POST['username']}','{$password}','{$_POST['lastname']}','{$_POST['firstname']}');";
            if($mysql->query($sql)){

                $responce["MESSAGE"] = "USER CREATED SUCEFFULY";
                $responce["STATUS"] = 200;
            }
            else{
                $responce["MESSAGE"] = "QUERRY ERROR";
                $responce["STATUS"] = 400;
            }
        }
    }

    else{
        $responce["MESSAGE"] = "INVALID REQUEST";
        $responce["STATUS"] = 400;
    }
    echo json_encode($responce);
?>
