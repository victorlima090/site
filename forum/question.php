    
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/login/login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';
    $db = mysqli_connect(DBHOST, DBUSER, DBPW, 'Nafisio2');
    
    if(isset($_GET['id'])){
        $_SESSION['id_question']=$_GET['id'];
        $_SESSION['question']=$_GET['text'];
    }
    if(isset($_POST['submit']) && !empty($_POST['text'])){
        
        $query="INSERT INTO answer VALUES('".$_SESSION['id_question']."','0','".$_POST['text']."','".$_SESSION['user']."','NOW()')";
        $result= mysqli_query($db, $query);
        header('Location:'.$_SERVER['PHP_SELF']);
        
    }
    $query="SELECT * FROM answer WHERE id_question =".$_SESSION['id_question']." ORDER BY id ASC";
    $result= mysqli_query($db, $query);
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Nafisio</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        </head>
        <body>
            <form method="post" action="">
                <table class="table">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Text</th>
                          <th>User</th>
                          <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    echo "<p>".$_SESSION['question']."</p>";
                    while($row= mysqli_fetch_array($result)){
                        echo "<tr>";//create new line on table
                        echo '<th scope="row">'.$row['id'].'</th>';
                        echo "<td>".$row['text']."</td>";
                        echo "<td>".$row['user']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "</tr>";//close line
                    }
                    ?>
                    </tbody>
                </table>              
        </form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <label>Adicionar Resposta</label>
            <input type="text" name="text"><br/>
            <input type="submit" name="submit"><br/>
            <a href="../index.php">Home</a><br/>
            <a href="../login/logout.php">Logout</a>
            <a href="index.php">Forum</a>
        </form>
        </body>
    </html>


