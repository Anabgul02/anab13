<?php

function check_login($con){
    if(isset($_SESSION['user_id'])) {
        //to know if user exists
       $id= $_SESSION['user_id'];            
       $query="select * from users where user_id= '$id' limit 1";
       //to add user
       $result = mysqli_query($con,$query);
       if($result && mysqli_num_rows($result)>0){
       
        //assoc is for associated array
        $user_data=mysqli_fetch_assoc($result);
        return $user_data;
       }
    }
    //redirect to login
   header("Location: login.php");
    die;
}
function random_num($length){
    $text="";
    if($length<5){
        $length=5;
    }
    $len=rand(4,$length);
    for($i=0;$i< $len;$i++){
    
        $text.=rand(0,9);
    }
    return $text;
}


