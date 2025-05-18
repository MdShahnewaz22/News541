<?php  
// db connection
$host ='localhost';
$user ='root';
$pass ='';
$db ='news541';
$conn = new mysqli($host,$user,$pass,$db);
if ( $conn -> connect_error ) {
    die ($conn ->error);
}else{

    // echo "database connected successfully";
}

?>
