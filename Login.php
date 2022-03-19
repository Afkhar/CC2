<?php 
session_start();
require_once 'connectdb.php';  
?>

<!--Login page-->
<html lang="en">
<head>
    <title>ChannalDoc.lk</title>
   <!-- <link rel = "stylesheet" href="CSS/Login.css">-->
</head>
<body>
    <a href='Index.php'>Home</a>
    <br><a href='Signin.php'>Sign in</a><br>
    <a href='Login.php'>Login</a><br>
    <br>
    <div class="login-box">
    <h2>Login</h2>
    <br>
    <form action="Login.php" method='POST' >
    <div class="user-box">
            <label for='email'>Email</label>
        <br><Input type='email' name='email' require='yes' id='email'>
    </div>
    <div class="user-box">
        <br><label for='Pass'>Password</label>
        <br><Input type='Password' name='Pass' require='yes' id='Pass'><br>
    </div>
        <br>
        <input type="Submit" name="Login" values="Login"><br>

        <br><a href='Login.php'>Forgot Password?</a><br>
    </form>
    </div>

 


<?php 
//Login Validation




if(isset($_POST['Login']))
{
    
   try{
        $conn = connect2db();
    
        $query = "SELECT * FROM `users` WHERE `Email` = :Email";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':Email', $_POST['email']);
        $stmt->execute();


        if($stmt->rowCount())
       {

            if( ($row = $stmt->fetch()) 
                &&
                $row['Email']==$_POST['email'] 
                &&
                password_verify($_POST['Pass'], $row['Password'])
            )
                echo "wow"; //bug fix
            {
                $_SESSION['User']=$row['First_Name'];
                header("Location:main.php");
            }  
        }
        else {
    	     echo "Login Failed.";
        }
    }
    catch(PDOException $e)
    {
        throw new PDOException($e->getMessage(),(int)$e->getCode());
    } 
}


?>


</body>
</html>