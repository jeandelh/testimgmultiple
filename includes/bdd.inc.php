<?php 
    try 
    {
        $db = new PDO('mysql:host=localhost;dbname=tuto', 'root', '');
    }
    catch (Exception $e)
    {
        die($e->getMessage());
    }
?>