<?php

    include '../api/connexionPost.php';
    include '../api/utf8.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../api/verifyPassword.php';

    //user existe
    $data2 = array();
    $sql = "SELECT title,public FROM project WHERE ownerid IN (SELECT userid FROM users WHERE email='{$email}');";
    $table_data2 = $mysql->query($sql);
    while($row = $table_data2->fetch_array(MYSQLI_ASSOC)){
        $data2[] = $row;
    }
    if(count($data2) > 0){
        $responce["MESSAGE"] = $data2;
        $responce["STATUS"] = 200;
    }
    else{
        $responce["MESSAGE"] = "THIS USER HAVE NO PROJECT";
        $responce["STATUS"] = 400;
    }
    echo json_encode($responce);
?>
