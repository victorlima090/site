<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
            <h1>Fórum</h1>
        </div>
        <div id="topic">
            <div class="table-header">Alert </div>
            <div class="table-header">Lock Icon</div>
            <div class="table-header">Ultimas Postagens</div>
            <div class="table-header">Comentarios</div>
            
            <div class="table-header" id="table-header-left">
                   Tópicos <img src="images/discussoes-icon.png" alt="discussoes icon"/>
            </div>
            
            <div class="table-header" id="table-header-left">
                    Criar<a href="criar_topico.php"><img src="images/criar-icon.png" alt="criar icon"/></a>
            </div >
            
            <div class="table-header" id="table-header-left">
                    Editar<img src="images/editar-icon.png" alt="editar icon"/>
            </div>
                    
            <div class="table-header" id="table-header-left">
                    Deletar<img src="images/deletar-icon.png" alt="deletar icon"/>
            </div>

        </div>
        <footer class="footer">
            <p> &copy; 2017 NAFISIO	</p>
         </footer>
    </body>
</html>
