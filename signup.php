<?php

session_start();
include("connection.php");
include("functions.php");
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    //SOMETHING WAS POSTED
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
     //save to database
     $user_id=random_num(20);
     $query="insert into users(user_id,user_name,password) values('$user_id','$user_name','$password')";
     
     mysqli_query($con, $query);
     header("Location: login.php");
     die;
    }else{
        echo "please enter some valid information!";
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
</head>
<body>
<style type="text/css">
#text{
 height:25px;
 border-radius:5px;
 padding:24px;
 border:solid thin #aaa; 
 width: 70%;  
}
#button{
    padding :8px;
    width:90px;
    color: white;
    background-color: Lightblue;
    border: none;

}
#box{
    background-color: grey;
    margin: auto;
    width: 300px;
    padding: 20px;
    width: 30%;

}
</style>

<div id="box"> 
<form method="post"> 
    <div style="font-size: 20px;margin:  10px;color: white">Signup</div>
<input id="text" type="text" name="user_name"><br><br>
<input id="text" type="password" name="password"><br><br>
<input id="button" type="submit" value="Signup"><br><br>

<a href="login.php">Click to Login</a><br><br>
</form>

</div>

</body>



</html>