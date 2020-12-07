<?php
require 'includes/bdd.inc.php';

if(isset($_POST['submit']))
{
    $fileCount= count($_FILES['file']['name']);
    for($i=0;$i<$fileCount;$i++){
        $fileName = $_FILES['file']['name'][$i];
        // $fileName = $_FILES['file']['name'][$i];
        $sql ="INSERT INTO fileup (title,img) VALUES ('$fileName','$fileName')";
        if($db->query($sql)== TRUE){
            echo "fichier enregistré";
        }
        else{
            echo "erreur";
        }
        move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/'.$fileName);
    }
}
?>
<form action='' method="post" enctype="multipart/form-data">
    <input type='file' name='file[]' id='file' multiple>
    <input type='submit' name='submit' value='upload'>
</form>