<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./signUp.css">
    
    <style>
        .form{
            width: 230px;
            height: 280px;
        }
    </style>
</head>
<body>

<?php
session_start();
        require('./conection.php');
        if(isset($_POST['login_button'])){
            $_SESSION['validate']=false;
            $email = $_POST['email'];
            $password=$_POST['password'];
            $p =crud::conect()->prepare('SELECT * FROM crudtable WHERE email=:e AND PASSWORD=:p');
            $p->bindValue(':e',$email);
            $p->bindValue(':p',$password);
            $p->execute();
            $result = $p->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) > 0){
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                $_SESSION['validate']=true;

                header('location:Home.php');
                }else{
                    echo'nooooo!!!';
                }
            }
?>
    <div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
        <form action="" method="post">
            <input type="email" name="email" placeholder="email">
            <input type="text" name="password" placeholder="password">
            <input type="submit" value="Login" name="login_button">
        </form>

    </div>
</body>
</html>

