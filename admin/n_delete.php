<?php

//db connection
include "../lib/connection.php";

 if(isset($_GET['id'])){
    $d_id = $_GET['id'];
    // echo $d_id;
    $delete_sql ="DELETE FROM news WHERE id = $d_id";
    // $conn ->
    if($conn ->query($delete_sql)){
        header("Location:news.php");   

    }else{
        die($conn ->error);
    }

 }else{   
    header("Location:news.php");

 }

?>