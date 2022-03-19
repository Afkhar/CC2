<?php 
    // check to see if the user successfully created an account 
    if (isset($success) && $success == true){ 
        echo '<font color="green">Yay!! Your account has been created. <a href="./login.php">Click here</a> to login!<font>'; 
    } 
    // check to see if the error message is set, if so display it 
    else if (isset($error_msg)) 
        echo '<font color="red">'.$error_msg.'</font>'; 
    else
        echo ''; // do nothing
?>