<?php
// connnect to the data base config

    $db_name='http://localhost:8080/phpmyadmin/index.php?route=/database/structure&db=portfolio';
    $user_password = '';
    $conn = new PDO($db_name, $user_name, $user_password);
    function random_id(){
    $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $rand= array();
    $length strlen($str)-1;
    for($i = 0; $i < 20; $i++){ 
        $n = mt_rand (0, $length)
        $rand[] = $str[$n];
    }
    return implode($rand);
}

?>