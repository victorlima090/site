<?php/* COMO VERIFICAR O NOME DOS ARQUIVO E MUDAR ELE PRA PASTA QUE A GNT QUER
$msg="incio";
$target=$_SERVER['DOCUMENT_ROOT']."/Nafisio/forum/uploaded_files/";
if(isset($_POST['submit'])){
        $file_name=$_FILES['pdf_file']['name'];
        $target=$target.$file_name;
        $file_name="uploaded_files/".$file_name;
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $target)){
            $msg="movido com sucesso";
        
        }else{
            $msg="alguma coisa deu errada,tmp_name:".$_FILES['pdf_file']['tmp_name']." target:".$target." size:".$_FILES['pdf_file']['size'];
          
        }
}
*/
?>


<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Nafisio/css/forum_style.css" rel="stylesheet" type="text/css"/>
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
            <a href="../login/logout.php"><div id="logout"><img src="images/sair-icon.png" alt="sair icon">Sair</div></a>
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
            <div id="title">Fórum</div>
            
            
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