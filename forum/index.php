<?php 
$msg="incio";
$target=$_SERVER['DOCUMENT_ROOT']."/Nafisio/forum/uploaded_files/";
if(isset($_POST['submit'])){
        
        $target=$target.$_FILES['pdf_file']['name'];
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $target)){
            $msg="movido com sucesso";
        
        }else{
            $msg="alguma coisa deu errada,tmp_name:".$_FILES['pdf_file']['tmp_name']." target:".$target." size:".$_FILES['pdf_file']['size'];
          
        }
}

?>


<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="forum_style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
          <div id="container">
            <div class="header-banner">                
                <ul id="navbar">
                    <li><a href="#">AJUDA</a></li>
                    <li><a href="#">PORTAL DO ALUNO</a></li>
                    <li><a href="#">PORTAL DO PROFESSOR</a></li>
                    <li><a href="#">A TUTORIA</a></li>
                    <li><a href="quem_somos.html">QUEM SOMOS</a></li>
                </ul>                                
            </div>            
        </div>
        <!-- enctype para dar upload, e necessario completar o action -->
        <?php echo "</br>".$msg; ?>
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="file" name="pdf_file" id="pdf_file">
            <input type="submit" name="submit" id="submit">
            <img src="<?php echo $target ?>" style="width: 70px;height: 70px;" alt="target image"> 
            
        </form>
        
        
        <div >
               
        </div>
    </body>
</html>
