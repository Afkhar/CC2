<?php
    session_start();
    include_once 'connectdb.php';

    $conn = connect2db();
    if(isset($_SESSION['User'])){
    
    //$query ="DELETE FROM `user` WHERE `Email`= :Email'";
       // $stmt = $conn->prepare($query);
       // $stmt->bindParam(':Email', $_POST['Email']);
        $stmt->execute();
    }

    header('location:Index.php');
    

?>