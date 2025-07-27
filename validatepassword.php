<?php
extract($_POST);
echo $username;
echo $password;

$hash_password = md5($password);

include("dbconnect.php");

$sql = "select username from users where username = '$username' and password ='$hash_password' ";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) === 1){
    echo "Login Sucessfully";
    session_start();
    $_SESSION["username"]=$username;
    header("Location:management.php");

}else{
        echo "Wrong password";
        header("Location:login.php?message='Wrong username and passowrd'");
 
}
    
 

?>