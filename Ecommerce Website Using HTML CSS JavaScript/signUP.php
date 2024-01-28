<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signUp.css">
    <title>Document</title>
</head>
<body>
    <?php
        require('./conection.php');

        if(isset($_POST['signUp_button'])){
            $name=$_POST['name'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confipassword=$_POST['confipassword'];
            if(!empty($_POST['name'])&&!empty($_POST['lastName'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['confipassword'])){
            if($password==$confipassword){
                $p = crud::conect()->prepare('INSERT INTO crudtable( name ,lastname,email,PASSWORD) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n',$name);
                $p->bindValue(':l',$lastName);
                $p->bindValue(':e',$email);
                $p->bindValue(':p',$password);
                $p->execute(); 
                echo'Successfully';
            }else{
                echo 'Password does not match!';
            } 
            }
        }

        
    ?>
    <div class="form">
        <div class="title">
            <p>Sign Up form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="email" name="email" placeholder="email">
            <input type="text" name="password" placeholder="password">
            <input type="text" name="confipassword" placeholder="confirm password">
            <input type="submit" value="Sign Up" name="signUp_button">
        </form>

    </div>
</body>
</html>
