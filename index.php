<?php
require 'includes/bdd.inc.php';

$extensions_autorisees=array('.png','.jpg','.gif','.igo','jpeg');

if(isset($_POST['submit']))
{
    $fileCount= count($_FILES['file']['name']);
   
    for($i=0;$i<$fileCount;$i++){

        $fileName = $_FILES['file']['name'][$i];
        $file_dest='upload/'.$fileName;

        $file_extension =strrchr($fileName, ".");

        if(in_array($file_extension, $extensions_autorisees)){

            $sql ="INSERT INTO fileup (title,img) VALUES ('$fileName','$file_dest')";
            
            if($db->query($sql)== TRUE){
                echo "fichier enregistré";
            }

            else
            {
                echo "erreur";
            }
            move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/'.$fileName);
        }
        
        else
        {
            echo 'erreur';  
        }
    }
}
?>
<form action='' method="post" enctype="multipart/form-data">
    <input type='file' name='file[]' id='file' multiple>
    <input type='submit' name='submit' value='upload'>
</form>