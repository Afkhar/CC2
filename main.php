<?php
    session_start();

    if(isset($_SESSION['User']))
    {
    echo "Welcome " . $_SESSION['User'];
    }
    else
    {
        header("Location:Index.php");
    }
?>


<html lang="en">
<head>
    <title>channeldoc Main page</title>
</head>
<body>
    <h1>Welcome to channeldoc Main page</h1>


    <a href=''>Doctor channel</a><br>
    <a href=''>Doctors</a><br>
    <a href=''>My informations</a><br>
    <a href='Logout.php'>Logout</a><br>
    <a href='Delete.php'>Delete Account</a><br>
</body>
</html>