<?php
    $db_name = "mysql:host:localhost;dbname=register_db";
    $user_name = "root";
    $user_password = "";

    $conn = new PDO ($db_name,$user_name, $user_password);

    function random_id(){
        $str = 'abcdefghijklmnopqrstuvwhyzABCDEFGHIJKLMNOPQRSTUVWHYZ1234567890';
        $rand = array();
        $length = strlen($str) - 1;
        for ($i=0; $i < 20 ; $i++) { 
            $n = mt_rand(0, $length);
            $rand[] = $srt[$n];

        }
        return implode($rand);
    }
?>