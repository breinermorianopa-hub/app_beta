<?php //Data base connection
require('../config/database.php');

//Get data from login form
$e_mail = $_POST ['email'];
$p_asswd = $_POST['pswd'];
$enc_pass =  md5($p_sswd);
//query 
$sql_login = "
SELECT u.* from
users u
where u.email = '$e_mail' 
and u.password = '$enc_pass'
";
//Execute query

$res= pg_query($sql_login);
if($res){
   $num = pg_num_rows($res);
   if($num > 0){
  header('refresh:0;url=home.php');
   }else{
  echo "<script>alert('Email or password not found.')</script>";
  header('refresh:0;url=signin.html.');
   }
}else{
echo "Query error !!!.";

}

?>