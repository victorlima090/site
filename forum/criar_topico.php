<?php

session_start();

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Nafisio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Nafisio/css/criar_topico_style.css" rel="stylesheet" type="text/css"/>
        
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
                Fórum>Criar>Título
            </div>
        </div>
        <div id="topic">
                      
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
        <br>
        <img id="user-img" src="images/minhaconta-icon.png" alt="user icon">
        
            
            <form  enctype="multipart/form-data" method="post" action="index_forum.php" id="form">
                <div id="form-header">
                    <div id="input-text-box">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
                        <input type="text" name="titulo" placeholder="Titulo 1" id="titulo-input">
                        <input type="text" name="descricao" placeholder="Adicionar uma descrição" id="descricao-input">
                    </div>
                    
                    <div class="form-header-left">
                        <a href="index_forum.php"><img src="images/cancelar.png" alt="cancelar icon"/></a>Cancelar
                    </div>
                    <div class="form-header-left">
                       <input type="submit" name="submit" id="publicar-button" value=""/>Publicar
                    </div>
                    <div class="form-header-left">
                        <img src="images/salvar.png" alt="salvar icon"/>Salvar
                    </div>
                </div>
                
                <div id="form-body">
                    
                    <textarea  name="texto" placeholder="alguma coisa" ></textarea>
                    
                </div>
                
                <div id="form-footer">
                    <img class="form-footer-icon" src="images/texticon.png" alt="text icon"/>
                    <div class="upload_file">
                        
                        <label for="anexo">
                            <img class="form-footer-icon" src="images/anexo.png" alt="anexo icon"/>
                        </label>
                    
                    <input type="file" name="anexo" id="anexo" />
                    </div>
                    <img class="form-footer-icon" src="images/image.png" alt="image icon"/>
                    <img class="form-footer-icon" src="images/emoji.png" alt="emoji"/>
                    <img class="form-footer-icon" src="images/drive.png" alt="drive"/>
                    
                </div>
                    
            </form>
            
        
        
        <footer class="footer">
            <p> &copy; 2017 NAFISIO	</p>
         </footer>
    </body>
</html>
