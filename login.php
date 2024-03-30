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
     //read to database
    $query="select * from users where user_name='$user_name' limit 1";
     
    $result= mysqli_query($con, $query);
    if($result){
        if($result && mysqli_num_rows($result)>0){
            $user_data=mysqli_fetch_assoc($result);
           if($user_data['password']=== $password){
           
           
           $_SESSION['user_id']= $user_data['user_id'];
            header("Location: index.php");
            die; 
           }
        }
    }
    echo "wrong username or password";
    }else{
        echo "wrong username or password";
    }
  }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>
<body>
<style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
        }
        #box {
            background-color: #fff;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        #box:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #66afe9;
        }
        #button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        #button:hover {
            background-color: #45a049;
        }
    </style>

<div id="box"> 
<form method="post"> 
    <div style="font-size: 20px;margin:  10px;color: white">Login</div>
<input id="text" type="text" name="user_name"><br><br>
<input id="text" type="password" name="password"><br><br>
<input id="button" type="submit" value="Login"><br><br>

<a href="signup.php">Click to Signup</a><br><br>
</form>

</div>

</body>

</html>