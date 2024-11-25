<?php 

    if(isset($_GET['submit'])){
        $username = $_GET['username'];
        $password = $_GET['password'];

        if($username == null || $password == null){
            echo "Null username/password";
        }elseif($username == $password){
           
            header('location: home.html');
        }

    
    }else{

        header('location: name.html');
    }


?>