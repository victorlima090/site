<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';
session_start();
    //Inicializa counter
    $counter=1;    
    //Conecta com banco de dados
    $db = mysqli_connect(DBHOST, DBUSER, DBPW, 'Nafisio');
    if (!$db){
    die("<br/>Connection error: " . mysqli_connect_error());
    }
    if(isset($_GET['id'])){
        $id_topico=$_GET['id'];
        echo $id_topico;
        $query="SELECT * FROM Discussoes WHERE id=".$id_topico;
        $result= mysqli_query($db, $query);
        $row= mysqli_fetch_array($result);
    }
    if(isset($_POST['submit'])){
        $id_topico=$_POST['id_topico'];
        echo "esse e ".$id_topico;
        
        $username=$_POST['username'];
        $resposta=$_POST['resposta'];
        $query="INSERT INTO Resposta (id_topico,id,resposta,username,data) VALUES ('$id_topico','0','$resposta',"
                . "'$username',NOW())";  
        $result= mysqli_query($db, $query);
        
        $query="SELECT * FROM Discussoes WHERE id=".$id_topico;
        $result= mysqli_query($db, $query);
        $row= mysqli_fetch_array($result);
        echo $row['titulo'];
    }
    
    
    

?>


<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Nafisio/css/topicos_style.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        
        <div id="menu-left">
            <ul >
                <li><img style="margin:0;width: 80px;height: 83px;float: none;" src="images/symbol-icon-nafisio.png" alt="nafisio icon"></li>
                <li>  <img src="images/tutoria-icon.png" alt="tutoria icon"/><p>Tutoria</p> </li>
                
                <li style="background-color: #3dd3d3;opacity: 0.55;"> <img src="images/forum-icon.png" alt="forum icon"><p>Forum</p></li>                
                
                <li> <img src="images/tarefas-icon.png" alt="tarefas icon"><p>Tarefas</p> </li>
                
                <li> <img src="images/publicacoes-icon.png" alt="publicaçoes"><p>Publicações</p></li>
                <li> <img src="images/calendario.png" alt="calendario icon"><p>Calendário</p></li>
                <li><img src="images/inbox-icon.png" alt="inbox icon"><p>Inbox</p></li>
                <li><img src="images/ajuda-icon.png" alt="ajuda icon"><p>Ajuda</p></li>
                
            </ul>               
        </div>
        <div id="header">
            <div class="header-icon">
                <a href="../login/logout.php">
                    <img src="images/sair-icon.png" alt="sair icon">Sair
                </a>
                </div>
            <div id="search-bar"> 
                <input type="text" name="search-bar" placeholder="" >
            </div>
            <div class="header-icon">
                <img src="images/admin-icon.png" alt="admin icon"/>Admin
            </div>
            
            <div class="header-icon">
                <img src="images/arquivos-icon.png" alt=""/>Arquivos
            </div>
            
            <div class="header-icon">
                <img src="images/minhaconta-icon.png" alt=""/>Minha Conta
            </div>
            <div id="header-forum">
                Fórum>Título1
            </div>
        </div>
        <div id="topic">
            <a href="index_forum.php">          
            <div class="table-header" id="table-header-left">
                   Tópicos <img src="images/discussoes-icon.png" alt="discussoes icon"/>
            </div>
            </a>
            
            <div class="table-header" id="table-header-left">
                Criar<img src="images/criar-icon.png" alt="criar icon"/>
            </div >
        
            <div class="table-header" id="table-header-left">
                    Editar<img src="images/editar-icon.png" alt="editar icon"/>
            </div>
            <a href="#">
            <div class="table-header" id="table-header-left">
                    Deletar<img src="images/deletar-icon.png" alt="deletar icon"/>
            </div>
            </a>

        </div>
        <br>
        <div id="show-topic">
            <div class="resposta-user">
                <img id="topic-user-img" src="images/minhaconta-icon.png" alt="user icon">Postado por 
                <?php echo $row['username']." em ".$row['data'] ?>
            </div>
            
            <div id="topic-header">
                <div id="topic-title">
                    <p id="titulo-input"><?php echo $row['titulo']?></p>
                    <p id="descricao-input"><?php echo $row['descricao']?></p>
                </div>

                

            </div>
            <div id="topic-text">
                <p>
                   <?php echo $row['texto']?>
                </p>
            </div>
            <div id="topic-footer">
                <?php 
                    if(!empty($row['file_name'])){
                        echo '<a href="'.$row['file_name'].
                                '" download="">'.
                                $row['file_name'].
                                '</a>';
                    }
                ?>
            </div>
            
        </div>
        <?php 
        $query="SELECT * FROM Resposta WHERE id_topico='$id_topico' ORDER BY id ASC";
        $result= mysqli_query($db, $query);
        while($row= mysqli_fetch_array($result)){
            
            echo '<div class="show-resposta">';
                echo '<div class="resposta-user">';
                echo '<img  src="images/minhaconta-icon.png" alt="user icon">Postado Por '.
                        $row['username'].' em '.$row['data'];
                echo '</div>';
                echo '<div class="respota-text">';
                echo '<p>';
                    echo $row['resposta'];
                echo '</p>';
                echo '</div>  ';
                echo '</div>';
        }
        
            
        ?>
       
          
    
        
        <div id="add-resposta">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
                    <div class="resposta-user">
                    <img  src="images/minhaconta-icon.png" alt="user icon">
                    </div>
                
                
                
                <textarea  name="resposta" placeholder="alguma coisa" ></textarea>
                <div class="topic-header-left">
                <input type="submit" name="submit" value="" id="responder-button">Responder
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
                <input type="hidden" name="id_topico" value="<?php echo $id_topico ?>">
              
                </div>
            </form>
            
        </div>
        
            
        
        
        <footer class="footer">
            <p> &copy; 2017 NAFISIO	</p>
         </footer>
    </body>
</html>
