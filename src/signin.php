<?php
    // Database connection
  require ("../config/database.php");
    //get data from form
        $e_mail = $_POST['email'];
        $p_ssword = $_POST['pswd'];
        $enc_pass= md5($p_ssword);
    //query to select from sql
        $sql_login = "SELECT * FROM users u WHERE u.email='$e_mail' AND u.passwd='$enc_pass'";
    //execute query
        $res = pg_query($sql_login);
    if($res){
            $num = pg_num_rows($res);
        if($num > 0){ 
            header('refresh:0;url = home.php');
    }else{
            echo"<script>alert('Email or password not found')</script>";
            header('refresh:0;url = signin.html');
        }
    } else {
        echo "Query error |||. ";
    }
?>