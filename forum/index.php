    
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/login/login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';
    $db = mysqli_connect(DBHOST, DBUSER, DBPW, 'Nafisio2');
    if(isset($_GET['submit']) && !empty($_GET['title'])){
        
        $query="INSERT INTO question VALUES('0','".$_GET['title']."','".$_GET['text']."','".$_SESSION['user']."','NOW()')";
        $result= mysqli_query($db, $query);
        header('Location:'.$_SERVER['PHP_SELF']);
        
    }
    $query="SELECT * FROM question ORDER BY id ASC";
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
            <form method="get" action="">
                <table class="table">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>User</th>
                          <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row= mysqli_fetch_array($result)){
                        echo "<tr>";//create new line on table
                        echo '<th scope="row">'.$row['id'].'</th>';
                        echo '<td><a href="question.php?id='.$row['id'].'&text='.$row['text'].'">'.$row['title']."</a></td>";
                        echo "<td>".$row['user']."</td>";
                        echo "<td>".$row['data']."</td>";
                        echo "</tr>";//close line
                    }
                    ?>
                    </tbody>
                </table>              
        </form>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
            <label>Adicionar Tópico</label>
            <input type="text" name="title"><br/>
            <label>Pergunta:</label>
            <input type="textarea" name="text">
            <input type="submit" name="submit"><br/>
            <a href="../index.php">Home</a><br/>
            <a href="../login/logout.php">Logout</a>
            
        </form>
        </body>
    </html>


