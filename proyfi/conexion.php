<?php
    $hos_db="127.0.0.1:3306";
    $user_name="root";
    $user_pass="S92Su*D4";
    $db_name="pf";

    $conexion=new mysqli($hos_db,$user_name,$user_pass,$db_name);

    if($conexion->connect_error){
        }
        else{
            echo "<h1>BIENVENIDO</h1>";
        }


?> 