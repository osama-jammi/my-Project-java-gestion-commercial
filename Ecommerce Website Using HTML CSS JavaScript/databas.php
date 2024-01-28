<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Stylesheet" href="./databas.css">
</head>
<body>


    <table>
        <thead>
            <tr>
            <th>Name</th>
            <th>last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('./conection.php');
                $p =crud::selectdata();
                if (count($p)>0) {
                    for ($i=0; $i <count($p) ; $i++) { 
                        echo'<tr>';
                        foreach ($p[$i] as $key => $value) {
                            if($key !='id'){
                                echo '<td>'.$value.'</td>';
                            }
                        }
                        ?>
                        <td><a href="users.php">Delete</a></td>
                        <td><a href="upDate.php">Edit</a></td>
                        <?php
                        echo'</tr>';
                    }
                }


            ?>  
        </tbody>
    </table>
    
</body>
</html>