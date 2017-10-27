<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/login/login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';
    //Inicializa counter
    $counter=1;    
    //Conecta com banco de dados
    $db = mysqli_connect(DBHOST, DBUSER, DBPW, 'nafisio');
    if (!$db){
    die("<br/>Connection error: " . mysqli_connect_error());
    }
    $msg="incio";
    $target=$_SERVER['DOCUMENT_ROOT']."/Nafisio/forum/uploaded_files/";
    if(isset($_POST['submit'])){
        $file_name=$_FILES['anexo']['name'];
        $target=$target.$file_name;
        $file_name="uploaded_files/".$file_name;
        if (move_uploaded_file($_FILES['anexo']['tmp_name'], $target)){
            $msg="movido com sucesso";
        
        }else{
            $msg="alguma coisa deu errada,tmp_name:".$_FILES['anexo']['tmp_name']." target:".$target." size:".$_FILES['pdf_file']['size'];
          
        }
        
        $username=$_POST['username'];
        $titulo=$_POST['titulo'];
        $descricao=$_POST['descricao'];
        $texto=$_POST['texto'];
        $query="INSERT INTO discussoes (id,titulo,descricao,texto,comentarios,ultima_postagem,locked,alert,username,file_name)"
                . " VALUES ('0','$titulo','$descricao','$texto','0',NOW(),'0','0','$username','$file_name')";
        $result=mysqli_query($db,$query);     

            
           
    }

    /*POR ENQUANTO SEM NENHUM SUBMIT BUTTON
    if(isset($_GET['submit']) && !empty($_GET['title'])){
        
        $query="INSERT INTO question VALUES('0','".$_GET['title']."','".$_GET['text']."','".$_SESSION['user']."','NOW()')";
        $result= mysqli_query($db, $query);
        header('Location:'.$_SERVER['PHP_SELF']);
        
    }*/
    //retira todas as informaçoes do banco de dados
    $query="SELECT * FROM discussoes ORDER BY id ASC";
    $result= mysqli_query($db, $query);
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Nafisio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Nafisio/css/forum_style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <a href="#" download=""></a>
        <div id="menu-left">
            <ul >
                <a href="../index.html"><li><img style="margin:0;width: 80px;height: 83px;float: none;" src="images/symbol-icon-nafisio.png" alt="nafisio icon"></li></a>
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
            <!-- <div id="title">Fórum</div> -->
            <div id="header-forum">
                Fórum
            </div>
        </div>
        <div id="topic">
            <div class="table-header">Alert </div>
            <div class="table-header">Lock Icon</div>
            <div class="table-header">Ultimas Postagens</div>
            <div class="table-header">Comentarios</div>
            
            <div class="table-header" id="table-header-left">
                   Tópicos <img src="images/discussoes-icon.png" alt="discussoes icon"/>
            </div>
            <a href="criar_topico.php">
            <div class="table-header" id="table-header-left">
                    Criar<img src="images/criar-icon.png" alt="criar icon"/>
            </div >
            </a>
            <div class="table-header" id="table-header-left">
                    Editar<img src="images/editar-icon.png" alt="editar icon"/>
            </div>
                    
            <div class="table-header" id="table-header-left">
                    Deletar<img src="images/deletar-icon.png" alt="deletar icon"/>
            </div>

        </div>                    
        <table id="topic-table">
            <tbody >
                <?php
                    while($row= mysqli_fetch_array($result)){
                        //aplicar estilos diferentes entre cada row
                        //ADD STYLE IN <tr>
                        if($counter%2==0){
                            echo '<tr >';
                            //verifica se tem notificaçoes                           
                            if($row['alert'])
                                 echo '<td><img style="width:15px;height:15px;" src="images/alertbell-icon.png" alt="alert icon"></td>';
                            else
                                echo "<td></td>";
                            //verifica se esta fechado
                            if($row['locked'])
                                echo '<td><img style="width:15px;height:15px;" src="images/locked-icon.png" alt="locked icon"></td>';
                            else
                                echo '<td><img style="width:15px;height:15px;" src="images/unlocked-icon.png" alt="locked icon"></td>';
                            echo '<td id="td-ultima-postagem">'.$row['ultima_postagem']."</td>";
                            echo "<td>".$row['comentarios']."</td>";
                            echo '<td id="topic-cell" >'.
                                    '<a href="topicos.php?id='.$row['id'].'">'.
                                        '<p id="table-cell-title">'.
                                            $row['titulo'].
                                        '</p>'.
                                    "</a>".
                                 "</td>";
                            //close line
                            echo "</tr>";
                        }else{
                           echo '<tr >';
                            //verifica se tem notificaçoes                           
                            if($row['alert'])
                                 echo '<td><img style="width:15px;height:15px;" src="images/alertbell-icon.png" alt="alert icon"></td>';
                            else
                                echo "<td></td>";
                            //verifica se esta fechado
                            if($row['locked'])
                                echo '<td><img style="width:15px;height:15px;" src="images/locked-icon.png" alt="locked icon"></td>';
                            else
                                echo '<td><img style="width:15px;height:15px;" src="images/unlocked-icon.png" alt="locked icon"></td>';
                            echo '<td id="td-ultima-postagem">'.$row['ultima_postagem']."</td>";
                            echo "<td>".$row['comentarios']."</td>";
                            echo '<td id="topic-cell" >'.
                                    '<a href="topicos.php?id='.$row['id'].'">'.
                                        '<p id="table-cell-title">'.
                                            $row['titulo'].
                                        '</p>'.
                                    "</a>".
                                 "</td>";
                            //close line
                            echo "</tr>";
                        }
                        $counter=$counter+1;
                    }
                    ?>
                
                
            </tbody>
                
        </table>
            <!--
            <table id="table-topicos">                
                            
                <tbody>
                   <?php
                    while($row= mysqli_fetch_array($result)){
                        //aplicar estilos diferentes entre cada row
                        //ADD STYLE IN <tr>
                        if($counter%2==0){
                            //create new line on table    
                            echo '<tr class="tr1">';
                           // echo '<td><a href="topicos.php?id='.$row['id'].'&titulo='.$row['titulo'].'">'.$row['titulo']."</a></td>";
                            echo '<td style="text-align:left;"><a href="topicos.php?id=1&titulo=2">'.$row['titulo']."</a></td>";
                            echo "<td>".$row['topicos']."</td>";
                            echo "<td>".$row['comentarios']."</td>";
                            echo "<td>".$row['ultima_postagem']." por ".$row['username']."</td>";
                            //verifica se esta fechado
                          if($row['locked'])
                                echo '<td><img style="width:15px;height:15px;" src="images/locked-icon.png" alt="locked icon"></td>';
                            else
                                echo '<td><img style="width:15px;height:15px;" src="images/unlocked-icon.png" alt="locked icon"></td>';
                            //verifica se tem notificaçoes
                            if($row[alert])
                                 echo '<td><img style="width:15px;height:15px;" src="images/alertbell-icon.png" alt="alert icon"></td>';
                            else
                                echo "<td></td>";
                            
                            //close line
                            echo "</tr>";
                        }else{
                        
                            //create new line on table
                            //ADD STYLE IN <tr>
                            echo '<tr class="tr2">';
                            //echo '<td><a href="topicos.php?id='.$row['id'].'&titulo='.$row['titulo'].'">'.$row['title']."</a></td>";
                            echo '<td style="text-align:left;">'.$row['titulo']."</td>";
                            echo "<td>".$row['topicos']."</td>";
                            echo "<td>".$row['comentarios']."</td>";
                             echo "<td>".$row['ultima_postagem']." por ".$row['username']."</td>";
                            //verifica se esta fechado
                            if($row['locked'])
                                echo '<td><img style="width:15px;height:15px;" src="images/locked-icon.png" alt="locked icon"></td>';
                            else
                                echo '<td><img style="width:15px;height:15px;" src="images/unlocked-icon.png" alt="locked icon"></td>';
                            //verifica se tem notificaçoes
                            if($row[alert])
                               echo '<td><img style="width:15px;height:15px;" src="images/alertbell-icon.png" alt="alert icon"></td>';
                            else
                                echo "<td></td>";
                            
                            //close line
                            echo "</tr>";
                        }
                        $counter=$counter+1;
                    }
                    ?>
            </table>
            -->
            <?php
            if(isset($_GET['button'])){
                if($_GET['button']=="criar"){ ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <label>Tópico</label>
                    <br/>
                    <input type="text" name="topico" placeholder="">
                    <br/>
                    <label>Descrição</label>
                    <br/>
                    <input type="text" name=" descricao" placeholder="">
                    <br/>
                    <label>Texto</label>
                    <br>
                    <textarea rows="5" name="texto" ></textarea>
                    <br>
                    <input type="submit" name="submit" value="Criar">
                </form>
                    <?php
                }
                
            
                }
                ?>
            
        </div>
        
        
        
        
        
        <footer class="footer">
            <p> &copy; 2017 NAFISIO	</p>
         </footer>
    </body>
</html>



















  <!-- como fazer upload e download 
                <?php echo "</br>".$msg; ?>
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="file" name="pdf_file" id="pdf_file">
            <input type="submit" name="submit" id="submit">
            <img src="<?php echo $file_name ?>" style="width: 400px;height: 250px;" alt="target image"> 
            <a href="<?php echo $file_name ?>" download="">Download Here</a>
            
        </form>
        -->