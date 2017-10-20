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
        <link href="forum_style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <div >
               
        </div>
        
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