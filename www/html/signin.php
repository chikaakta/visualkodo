<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    include '../api/verifyPassword.php';
    $data = array();
    $sql = "SELECT email,lastname,firstname,username FROM users WHERE email='{$email}'";
    $table_data = $mysql->query($sql);

    while($row = $table_data->fetch_array(MYSQLI_ASSOC)){
        $data[] = $row;
    }
    $responce["MESSAGE"] = utf8ize($data);
    $responce["STATUS"] = 200;
    echo json_encode($responce);
?>

